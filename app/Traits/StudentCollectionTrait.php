<?php

namespace App\Traits;

use App\Fee;
use App\FeeMap;
use App\Student;
use App\FeeMapFund;
use App\FeeSubHead;
use App\StudentSession;
use App\AccountingLedger;
use App\Enums\VoucherType;
use App\StudentCollection;
use App\StudentWaiverConfig;
use App\StudentCollectionDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\StudentCollectionDetailsSubHead;
use App\Exceptions\StudentCollectionException;

trait StudentCollectionTrait
{
    use AccountingCalculationTrait;

    /**
     * Generate a basic Invoice number.
     *
     * We'll remove this maybe in future.
     *
     * @return string
     */
    public function generateCollectionInvoiceNo(): string
    {
        // Create an invoice number.
        $invoiceNumber = date('Y');

        // Append the month number.
        $invoiceNumber .= date('m');

        // Get the last invoice number.
        $lastInvoiceNumber = StudentCollection::where('invoice_id', 'like', '%' . $invoiceNumber . '%')
            ->orderBy('id', 'DESC')
            ->first();

        if ($lastInvoiceNumber) {
            $existingInvoiceId = $lastInvoiceNumber->invoice_id;
            $lastInvoiceNumber = substr($existingInvoiceId, 6);
            return $invoiceNumber . '' . str_pad($lastInvoiceNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            return $invoiceNumber . str_pad(1, 4, '0', STR_PAD_LEFT);
        }
    }

    public function getCollectionAmountsByFeeHeadAndSubHeads(
        int $studentId,
        int $feeHeadId,
        array $feeSubHeadIds
    ): array {
        $collectionData = [
            'student_id' => $studentId,
            'total_due' => 0,
            'total_paid' => 0,
            'waiver' => 0,
            'fine_payable' => 0,
            'fee_payable' => 0,
            'fee_and_fine_payable' => 0,
            'fee_and_fine_paid' => 0,
            'previous_due_payable' => 0,
            'previous_due_paid' => 0,
            'fee_head_id' => 0,
            'total_payable' => 0,
            'found_student' => false,
            'found_fee_amount' => false,
        ];
        // Get student info from student_sessions table
        $studentSession = StudentSession::where('student_id', $studentId)
            ->with('student')
            ->first();

        if (!$studentSession || empty($studentSession->student)) {
            return $collectionData;
        }

        // Make response that student is found.
        $collectionData['found_student'] = true;

        // Map the $feeSubHeadIds and convert them to integer
        $feeSubHeadIds = array_map(function ($feeSubHeadId) {
            return (int) $feeSubHeadId;
        }, $feeSubHeadIds);

        $feeMapFeeSubHeads = DB::table('fee_map_fee_sub_head')->where('fee_head_id', $feeHeadId)->pluck('fee_sub_head_id')->toArray();
        $commonValues = array_intersect($feeMapFeeSubHeads, $feeSubHeadIds);
        $feeSubHeads = FeeSubHead::whereIn('id', $commonValues)->get();

        if (!$feeSubHeads) {
            return $collectionData;
        }

        // Check in Fee, if there is any configuration for this class, section, session_id.
        $fee = Fee::where('class_id', $studentSession->class_id)
            ->where('section_id', $studentSession->section_id)
            ->where('session_id', $studentSession->session_id)
            ->where('student_category_id', $studentSession->student->student_category_id)
            ->where('fee_head_id', $feeHeadId)
            ->first();

        if (!$fee) {
            return $collectionData;
        }

        $waiver = StudentWaiverConfig::where('student_id', $studentId)->where('fee_head_id', $feeHeadId)->first();
        // dd($studentId,$waiver);
        if ($waiver) {
            $collectionData['waiver'] = $waiver->amount * count($feeSubHeads);
        }
        // Make response that fee is found.
        $collectionData['found_fee_amount'] = true;
        $collectionData['fee_head_id'] = $feeHeadId;

        // Get total amount by number of subheads.
        // dd($feeSubHeads);
        $collectionData['total_payable'] = $fee->fee_amount * count($feeSubHeads);

        // Total fine payable.
        $collectionData['fine_payable'] = $fee->fine_amount * count($feeSubHeads); // TODO: Will do it after check.

        // Total fine and fee payable.
        $collectionData['fee_and_fine_payable'] = $collectionData['total_payable'] + $collectionData['fine_payable'];

        // Update total payable amount.
        $collectionData['fee_payable'] = $fee->amount * count($feeSubHeads);

        // Update total_paid amount.
        // This is for initial time, so that user can identify
        // how much needs to be paid in the form.
        $collectionData['total_paid'] = $collectionData['fee_and_fine_payable'] - $collectionData['waiver'];
        $collectionData['fee_and_fine_paid'] = $collectionData['fee_and_fine_payable'];

        return $collectionData;
    }

    public function getLedgerIdFromFeeHead(int $feeHeadId): int
    {
        return FeeMap::where('fee_head_id', $feeHeadId)->value('ledger_id') ?? 0;
    }

    public function getFundIdFromFeeMap(int $ledgerId): int
    {
        $fundId = 0;

        $feeMap = FeeMap::where('ledger_id', $ledgerId)->first();

        if ($feeMap) {
            $fundId = FeeMapFund::where('fee_map_id', $feeMap->id)->value('fund_id') ?? 0;
        }

        return $fundId;
    }

    public function getTotalPreviousDueForStudentInFeeHead(
        int $studentId,
        int $feeHeadId,
        int $sessionId = null
    ) {
        if (!$sessionId) {
            $sessionId = get_option('academic_year');
        }

        return StudentCollectionDetails::where('student_id', $studentId)
            ->where('fee_head_id', $feeHeadId)
            ->where('session_id', $sessionId)
            ->orderBy('id', 'DESC')
            ->value('total_due')
            ?? 0;
    }

    public function generateCollectionDataFromPayslip(
        array $studentIds,
        array $payslipData
    ): array {
        $collections = [];

        // Check if previous due or attendance fine is enabled.
        $needsCheckPreviousDue = $payslipData['previous_due'] ?? false;
        $needsCheckAttendanceFine = $payslipData['attendance_fine'] ?? false;

        foreach ($studentIds as $studentId) {
            $collectionData = [];

            $feeHeadId = $payslipData['fee_head_id'];
            $collectionData['student_id'] = $studentId;
            $collectionData['session_id'] = $payslipData['session_id'];
            $collectionData['date'] = null;
            $collectionData['ledger_id'] = null;
            $collectionData['fund_id'] = null;
            $collectionAmounts = $this->getCollectionAmountsByFeeHeadAndSubHeads(
                $studentId,
                $feeHeadId,
                $payslipData['fee_sub_head_ids']
            );

            // Check if previous due is enabled.
            $previousDueAmount = 0;
            if ($needsCheckPreviousDue) {
                // Get total previous dues for this student of this fee head and session.
                $previousDueAmount = $this->getTotalPreviousDueForStudentInFeeHead(
                    $studentId,
                    $feeHeadId,
                    $payslipData['session_id']
                );
            }

            $totalPayable = $collectionAmounts['total_payable'] + $previousDueAmount;
            $collectionData['fee_heads'][$feeHeadId] = [
                'fee_head_id' => $feeHeadId,
                'sub_head_ids' => $payslipData['fee_sub_head_ids'],
                'total_paid' => 0, // As for payslip, we've handle it with total_paid = 0;
                'waiver' => $collectionAmounts['waiver'],
                'fine_payable' => $collectionAmounts['fine_payable'],
                'fee_payable' => $collectionAmounts['fee_payable'],
                'fee_and_fine_payable' => $collectionAmounts['fee_and_fine_payable'],
                'fee_and_fine_paid' => 0, // As for payslip, we've handle it with fee_and_fine_paid = 0;
                'previous_due_payable' => $collectionAmounts['previous_due_payable'],
                'previous_due_paid' => $previousDueAmount + $collectionAmounts['previous_due_paid'],
                'total_payable' => $totalPayable,
            ];

            $collectionData['total_due'] = 0; //TODO: calculate total due for this student.
            $collectionData['total_paid'] = 0;
            $collectionData['total_payable'] = $collectionData['fee_heads'][$feeHeadId]['total_payable'];
            $collectionData['note'] = null;

            $collections[] = $collectionData;
        }

        return $collections;
    }

    public function generateCollectionDataFormat(
        array $payslipData
    ): array {
        $collectionData = [];

        $collectionData['session_id'] = $payslipData['session_id'];
        $collectionData['id'] = $payslipData['collection_id'];
        $collectionData['invoice_date'] = $payslipData['date'];
        $collectionData['ledger_id'] = $payslipData['ledger_id'];
        $collectionData['details'] = [
            'total_paid' => $payslipData['total_paid'] ?? 0,
            'waiver' => $payslipData['waiver'] ?? 0,
            'fee_and_fine_payable' => $payslipData['total_payable'] + $payslipData['attendance_fine'],
            'fee_and_fine_paid' => $payslipData['total_paid'] ?? 0 - ($payslipData['waiver'] ?? 0),
            'total_payable' => $payslipData['total_payable'] ?? 0,
        ];

        $collectionData['total_due'] = $payslipData['total_due'] ?? 0;
        $collectionData['total_paid'] = $payslipData['total_paid'] ?? 0;
        $collectionData['total_payable'] = $payslipData['total_payable'] ?? 0;
        $collectionData['note'] = $payslipData['note'] ?? null;

        return $collectionData;
    }

    public function createCollection(array $data): ?StudentCollection
    {
        try {
            DB::beginTransaction();
            $studentId = $data['student_id'];

            $student = Student::find($studentId);

            if (!$student || empty($student->studentSession)) {
                throw new StudentCollectionException(__('Student not found.'));
            }

            $feeHeads = $data['fee_heads'];

            // filter out which feeHeads has fee_head_id
            // In quick collection, we've a checkbox to handle this.
            $feeHeads = array_filter($feeHeads, function ($feeHead) {
                return !empty($feeHead['fee_head_id']);
            });

            if (!count($feeHeads)) {
                throw new StudentCollectionException(__('No fee heads found.'));
            }

            // First ledger_id based on fee_heads.
            $ledgerId = $this->getLedgerIdFromFeeHead(array_key_first($feeHeads)) ?? 0;

            // Get fund id from first ledger from fee_maps and fee_map_fund.
            $fundId = null;
            if (!empty($data['ledger_id'])) {
                $fundId = $this->getFundIdFromFeeMap($ledgerId);
            }
            // Create a new student collection data.
            $studentCollection = [
                'student_id' => $studentId,
                'class_id' => $student->studentSession->class_id,
                'invoice_id' => $this->generateCollectionInvoiceNo(),
                'invoice_date' => $data['date'],
                'session_id' => $data['session_id'] ?? get_option('academic_year'),
                'attendance_fine' => $data['attendance_fine'] ?? 0,
                'total_payable' => $data['total_payable'] ?? 0,
                'total_paid' => $data['total_paid'] ?? 0,
                'total_due' => $data['total_due'] ?? 0,
                'note' => $data['note'],
                'ledger_id' => $ledgerId, // This ledger should be from config.
                'receive_ledger_id' => $data['ledger_id'], // This ledger should come from frontend.
                'fund_id' => $fundId,
                'created_by' => auth()->user()->id,
            ];
            $studentCollection = StudentCollection::create($studentCollection);

            if (!$studentCollection) {
                throw new StudentCollectionException(__('Student collection could not be created.'));
            }

            // Create student collection details - fee heads.
            $studentCollectionDetails = [];
            $studentCollectionDetailsSubHeadIds = [];

            foreach ($feeHeads as $feeHeadId => $feeHeadData) {
                $studentCollectionDetailsData = [
                    'student_collection_id' => $studentCollection->id,
                    'ledger_id' => $this->getLedgerIdFromFeeHead($feeHeadId),
                    'student_id' => $studentId,
                    'session_id' => get_option('academic_year'),
                    'fee_head_id' => $feeHeadId,
                    'total_paid' => $feeHeadData['total_paid'] ?? 0,
                    'waiver' => $feeHeadData['waiver'] ?? 0,
                    'fine_payable' => $feeHeadData['fine_payable'] ?? 0,
                    'fee_payable' => $feeHeadData['fee_payable'] ?? 0,
                    'fee_and_fine_payable' => $feeHeadData['fee_and_fine_payable'] ?? 0,
                    'fee_and_fine_paid' => $feeHeadData['total_paid'] - ($feeHeadData['waiver'] ?? 0),
                    'previous_due_payable' => $feeHeadData['previous_due_payable'] ?? 0,
                    'previous_due_paid' => $feeHeadData['previous_due_paid'] ?? 0,
                    'total_payable' => $feeHeadData['total_payable'] ?? 0,
                ];

                $studentCollectionDetails = StudentCollectionDetails::create(
                    $studentCollectionDetailsData
                );

                if (!$studentCollectionDetails) {
                    throw new StudentCollectionException(__('Student collection details could not be created.'));
                }

                if (isset($feeHeadData['sub_head_ids'])) {
                    $subHeadIds = $feeHeadData['sub_head_ids'] ?? [];
                    foreach ($subHeadIds as $feeSubHeadId) {
                        $studentCollectionDetailsSubHeadIds[] = [
                            'student_id' => $studentId,
                            'session_id' => $data['session_id'] ?? get_option('academic_year'),
                            'student_collection_id' => $studentCollection->id,
                            'student_collection_details_id' => $studentCollectionDetails->id,
                            'fee_head_id' => $feeHeadId,
                            'sub_head_id' => $feeSubHeadId,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }

            if (empty($studentCollectionDetailsSubHeadIds)) {
                throw new StudentCollectionException(
                    __('Student collection details sub heads could not be created.')
                );
            }

            if (!empty($studentCollectionDetailsSubHeadIds)) {
                $studentCollectionDetailsSubHeadIdsCreated = StudentCollectionDetailsSubHead::insert(
                    $studentCollectionDetailsSubHeadIds
                );

                if (!$studentCollectionDetailsSubHeadIdsCreated) {
                    throw new StudentCollectionException(
                        __('Student collection details sub heads could not be created.')
                    );
                }
            }

            // Sync with accounting.
            if ($data['total_paid'] > 0) {
                $this->syncAccountingTransaction($studentCollection->id);
            }


            DB::commit();

            return $studentCollection;
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            throw new StudentCollectionException($th->getMessage());
        }
    }

    /**
     * Update Single collection.
     *
     * @param array $data
     * @return integer
     */
    public function updateCollection(array $data)
    {
        try {
            DB::beginTransaction();

            // Get fund id from first ledger from fee_maps and fee_map_fund.
            // $fundId = null;
            // if (!empty($data['ledger_id'])) {
            //     $fundId = $this->getFundIdFromFeeMap($data['ledger_id']);
            // }

            // Update student collection data.
            $studentCollection = [
                'invoice_date' => $data['invoice_date'],
                // 'session_id' => $data['session_id'] ?? get_option('academic_year'),
                'attendance_fine' => $data['attendance_fine'] ?? 0,
                'total_payable' => $data['total_payable'] ?? 0,
                'total_paid' => $data['total_paid'] ?? 0,
                'total_due' => $data['total_due'] ?? 0,
                'note' => $data['note'] ?? null,
                'receive_ledger_id' => $data['ledger_id'],
                // 'fund_id' => $fundId, // No need to update fund_id. TODO: Remove this line later.
                'updated_by' => auth()->user()->id,
            ];

            $studentCollection = StudentCollection::where('id', $data['id'])
                ->update($studentCollection);

            if (!$studentCollection) {
                throw new StudentCollectionException(__('Student collection could not be updated.'));
            }

            $studentCollectionDetailsData = [
                'student_collection_id' => $data['id'],
                'session_id' => $data['session_id'] ?? get_option('academic_year'),
                'total_paid' => $data['details']['total_paid'] ?? 0,
                'waiver' => $data['details']['waiver'] ?? 0,
                'fee_and_fine_payable' => $data['total_payable'] ?? 0,
                'fee_and_fine_paid' => $data['details']['total_paid'] ?? 0 - ($data['details']['waiver'] ?? 0),
                'total_payable' => $data['details']['total_payable'] ?? 0,
            ];

            $studentCollectionDetails = StudentCollectionDetails::where('student_collection_id', $data['id'])->update(
                $studentCollectionDetailsData
            );

            if (!$studentCollectionDetails) {
                throw new StudentCollectionException(__('Student collection details could not be updated.'));
            }

            // Sync with accounting.
            if ($data['total_paid'] > 0) {
                $this->syncAccountingTransaction(
                    $data['id'],
                    'Student Payslip Collection'
                );
            }

            DB::commit();

            return $studentCollection;
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            throw new StudentCollectionException($th->getMessage());
        }
    }

    public function syncAccountingTransaction($studentCollectionId, $description = 'Student Quick Collection')
    {
        $studentCollection = StudentCollection::find($studentCollectionId);

        if (!$studentCollection) {
            throw new StudentCollectionException(__('Student collection could not be found.'));
        }

        // If no receive ledger id, then no need to sync with accounting.
        if (empty($studentCollection->receive_ledger_id)) {
            return;
        }

        $accountingCategory = AccountingLedger::where('id', $studentCollection->ledger_id)->first();

        foreach ($studentCollection->details as $studentCollectionDetail) {
            $data = [
                'category_id' => $accountingCategory->accounting_category_id ?? 1,
                'type' => VoucherType::RECEIPT,
                'transaction_date' => $studentCollection->invoice_date,
                'voucher_id' => $studentCollection->invoice_id,
                'fund_id' => $studentCollection->fund_id,
                'fund_to_id' => null,
                'payment_method_id' => $studentCollectionDetail->ledger_id,
                'payment_method_to_id' => null,
                'reference' => null,
                'description' => $description,

                'details' => [
                    [
                        'fund_id' => $studentCollection->fund_id,
                        'fund_to_id' => null,
                        'ledger_id' => $studentCollectionDetail->ledger_id,
                        'payment_method_id' => $studentCollectionDetail->ledger_id,
                        'payment_method_to_id' => null,
                        'debit' => $studentCollectionDetail->total_paid,
                        'credit' => 0,
                    ],
                ],
            ];

            $this->createAccountingTransaction(
                $data
            );
        }

        // Make a transaction for receive ledger.
        $data = [
            'category_id' => $accountingCategory->accounting_category_id ?? 1,
            'type' => VoucherType::RECEIPT,
            'transaction_date' => $studentCollection->invoice_date,
            'voucher_id' => $studentCollection->invoice_id,
            'fund_id' => $studentCollection->fund_id,
            'fund_to_id' => null,
            'payment_method_id' => $studentCollection->receive_ledger_id,
            'payment_method_to_id' => null,
            'reference' => null,
            'description' => $description,

            'details' => [
                [
                    'fund_id' => $studentCollection->fund_id,
                    'fund_to_id' => null,
                    'ledger_id' => $studentCollection->receive_ledger_id,
                    'payment_method_id' => $studentCollection->receive_ledger_id,
                    'payment_method_to_id' => null,
                    'debit' => 0,
                    'credit' => $studentCollection->total_paid,
                ],
            ],
        ];
        $this->createAccountingTransaction(
            $data
        );
    }
}
