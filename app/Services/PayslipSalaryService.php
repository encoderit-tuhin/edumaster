<?php

declare(strict_types=1);

namespace App\Services;

use App\PayslipSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\UserPayrollService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PayslipSalaryRepository;

class PayslipSalaryService
{
    public function __construct(
        private readonly PayslipSalaryRepository $payslipSalaryRepository,
        private readonly PaymentService $paymentService,
        private readonly UserPayrollService $userPayrollService,
        private readonly AccountTransactionService $accountTransactionService,

    ) {
    }

    public function processSalaryPayment(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');
        $userIds = $request->input('user_id');
        $payableAmounts = $request->input('payable');
        $paidAmounts = $request->input('paid_amount');

        DB::beginTransaction();
        try {
            foreach ($userIds as $key => $userId) {
                $existingPayslipSalary = PayslipSalary::where([
                    'user_id' => intval($userId),
                    'year' => $year,
                    'month' => $month,
                ])->first();

                if (!$existingPayslipSalary) {
                    continue;
                }

                $paidAmount = floatval($paidAmounts[$key]);
                $existingPayslipSalary->paid_amount = $paidAmount;
                $existingPayslipSalary->is_paid = $paidAmount > 0 ? '1' : '0';
                $existingPayslipSalary->payment_date = now();
                $existingPayslipSalary->save();

                $paymentData = [
                    'user_id' => intval($userId),
                    'year' => $year,
                    'month' => $month,
                    'amount' => $paidAmount,
                    'type' => 'salary',
                    'paid_by' => Auth::id(),
                ];
                $this->accountTransactionService->prepareForAccTransAndDetails($paymentData, 'debit');
                $this->paymentService->createPayment($paymentData);

                $payableAmount = floatval($payableAmounts[$key]);
                $dueAmount = $payableAmount - $paidAmount;
                $currentDueAmount = ($dueAmount > 0) ? $dueAmount : 0;
                $advanceAmount = ($dueAmount > 0) ? 0 : abs($dueAmount);
                $userPayroll = $this->userPayrollService->findByUserId(intval($userId));
                $userPayroll->current_due = $currentDueAmount;
                $userPayroll->current_advance = $advanceAmount;
                $userPayroll->save();

                if ($advanceAmount != 0) {
                    $paymentData = [
                        'user_id' => intval($userId),
                        'year' => $year,
                        'month' => $month,
                        'amount' => $advanceAmount,
                        'type' => 'advanced',
                        'paid_by' => Auth::id(),
                    ];
                    $this->accountTransactionService->prepareForAccTransAndDetails($paymentData, 'debit');
                    $this->paymentService->createPayment($paymentData);
                } else {
                    $type = ($currentDueAmount > 0) ? 'due' : 'advanced';
                    if ($currentDueAmount != 0) {
                        $paymentData = [
                            'user_id' => intval($userId),
                            'year' => $year,
                            'month' => $month,
                            'amount' => $currentDueAmount,
                            'type' => $type,
                            'paid_by' => Auth::id(),
                        ];

                        //Transaction Data
                        $this->accountTransactionService->prepareForAccTransAndDetails($paymentData, 'credit');
                        $this->paymentService->createPayment($paymentData);
                    }
                }
            }

            DB::commit();
            return ['success' => true, 'message' => 'Salary payment processed successfully.'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['error' => true, 'message' => 'Salary payment processed unsuccessfully'];
        }
    }
}
