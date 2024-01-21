<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\FeeHead;
use App\Student;
use App\StudentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeManagementReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getClassWisePaymentSummary(Request $request)
    {
        $feeHeads = $request->fee_heads;
        $year = $request->year;

        if (!empty($request->fee_heads)) {
            $monthlyData = DB::table('student_collections as sc')
                ->join('student_collection_details as scd', 'sc.id', '=', 'scd.student_collection_id')
                ->join('classes', 'sc.class_id', '=', 'classes.id')
                ->whereIn('scd.fee_head_id', function ($query) use ($feeHeads) {
                    $query->select('id')
                        ->from('fee_heads')
                        ->whereIn('id', $feeHeads);
                })
                ->whereYear('sc.invoice_date', $year)
                ->select(
                    'sc.class_id',
                    'classes.class_name',
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 1 THEN scd.fee_and_fine_payable ELSE 0 END) as January'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 2 THEN scd.fee_and_fine_payable ELSE 0 END) as February'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 3 THEN scd.fee_and_fine_payable ELSE 0 END) as March'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 4 THEN scd.fee_and_fine_payable ELSE 0 END) as April'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 5 THEN scd.fee_and_fine_payable ELSE 0 END) as May'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 6 THEN scd.fee_and_fine_payable ELSE 0 END) as June'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 7 THEN scd.fee_and_fine_payable ELSE 0 END) as July'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 8 THEN scd.fee_and_fine_payable ELSE 0 END) as August'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 9 THEN scd.fee_and_fine_payable ELSE 0 END) as September'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 10 THEN scd.fee_and_fine_payable ELSE 0 END) as October'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 11 THEN scd.fee_and_fine_payable ELSE 0 END) as November'),
                    DB::raw('SUM(CASE WHEN MONTH(sc.invoice_date) = 12 THEN scd.fee_and_fine_payable ELSE 0 END) as December')
                )
                ->groupBy('sc.class_id')
                ->get();

            if ($monthlyData && count($monthlyData) > 0) {
                return view('backend.fee_collection_report.partials.fee-head-month-collection', compact('monthlyData'));
            }
        }

        return view('backend.fee_collection_report.class-wise-payment-summary');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getFeeHeadInfoSummary(Request $request)
    {
        $classId = $request->class_id;
        $year = $request->year;

        $studentCollections = StudentCollection::select(
            'student_collections.student_id',
            'student_sessions.roll',
            'students.first_name',
            DB::raw('SUM(student_collection_details.fee_and_fine_paid) as total_amount'),
            DB::raw('SUM(CASE WHEN fee_heads.name = "New Admission" THEN student_collection_details.fee_and_fine_payable ELSE 0 END) as new_admission'),
            DB::raw('SUM(CASE WHEN fee_heads.name = "Tuition Fees" THEN student_collection_details.fee_and_fine_payable ELSE 0 END) as tuition_fees'),
            DB::raw('SUM(CASE WHEN fee_heads.name = "Exam Fees" THEN student_collection_details.fee_and_fine_payable ELSE 0 END) as exam_fees'),
            DB::raw('SUM(CASE WHEN fee_heads.name = "Transport Fees" THEN student_collection_details.fee_and_fine_payable ELSE 0 END) as transport_fees'),
            DB::raw('SUM(CASE WHEN fee_heads.name = "Model Test" THEN student_collection_details.fee_and_fine_payable ELSE 0 END) as model_test'),
            DB::raw('SUM(CASE WHEN fee_heads.name = "Attendance" THEN student_collection_details.fee_and_fine_payable ELSE 0 END) as attendance')
        )
            ->join('students', 'students.id', '=', 'student_collections.student_id')
            ->join('student_sessions', 'student_collections.session_id', '=', 'student_sessions.id')
            ->join('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
            ->join('fee_heads', 'fee_heads.id', '=', 'student_collection_details.fee_head_id')
            ->where('student_collections.class_id', $classId)
            // ->where('students.shift', $shift) 
            ->whereYear('student_collections.invoice_date', $year)
            ->groupBy('student_collections.student_id', 'students.id')
            ->get();

        if ($studentCollections && count($studentCollections) > 0) {
            return view('backend.fee_collection_report.partials.fee-head-info-summary', compact('studentCollections'));
        }

        return view('backend.fee_collection_report.fee-head-info-summary');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getFeeHeadClassCollection(Request $request)
    {
        $feeDetails = StudentCollection::where('class_id', $request->class_id)
            ->join('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
            ->join('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
            ->groupBy('student_collection_details.fee_head_id')
            ->select('fee_heads.id', 'fee_heads.name', DB::raw('SUM(student_collection_details.fee_and_fine_payable) as total_amount'))
            ->get()
            ->pluck('total_amount', 'id')
            ->toArray();
        $feeHeads = FeeHead::get();
        $class = ClassModel::find($request->class_id);
        if ($feeDetails && count($feeDetails) > 0) {
            return view('backend.fee_collection_report.partials.fee-head-class-collection', compact('feeDetails', 'feeHeads', 'class'));
        }

        return view('backend.fee_collection_report.fee-head-class-collection');
    }

    /**
     * Display the specified resource.
     */
    public function getMonthlyPaidInfo(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        $studentDetails = StudentCollection::select(
            'students.id as student_id',
            'student_sessions.roll',
            'students.first_name',
            'student_collections.invoice_id',
            'student_collections.invoice_date',
            DB::raw('GROUP_CONCAT(fee_heads.name, ": ", student_collection_details.fee_and_fine_paid) as details'),
            DB::raw('SUM(student_collection_details.fee_and_fine_paid) as total_amount')
        )
            ->join('students', 'students.id', '=', 'student_collections.student_id')
            ->join('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
            ->join('fee_heads', 'fee_heads.id', '=', 'student_collection_details.fee_head_id')
            ->join('student_sessions', 'student_collections.session_id', '=', 'student_sessions.id')
            ->whereYear('student_collections.invoice_date', $year)
            ->whereMonth('student_collections.invoice_date', date('m', strtotime($month)))
            ->groupBy('students.id', 'students.first_name', 'student_collections.invoice_id', 'student_collections.invoice_date')
            ->get();

        if ($studentDetails && count($studentDetails) > 0) {
            return view('backend.fee_collection_report.partials.monthly-paid-info', compact('studentDetails'));
        }

        return view('backend.fee_collection_report.monthly-paid-info');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getUnpaidFeeInfo(Request $request)
    {
        $year = $request->year;
        $section = $request->section;

        if (!empty($year)) {
            $dues = Student::select(
                'students.id as student_id',
                'students.first_name',
                'student_sessions.roll',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT(fee_heads.name, " : ", fee_sub_heads.name, "(", student_collection_details.total_payable-student_collection_details.total_paid, ")") SEPARATOR ", ") as due_details'),
                DB::raw('SUM(student_collection_details.fee_and_fine_payable - student_collection_details.fee_and_fine_paid) as total_fee_due'),
                DB::raw('SUM(student_collection_details.previous_due_payable - student_collection_details.previous_due_paid) as total_slip_due'),
                DB::raw('SUM(student_collection_details.total_payable - student_collection_details.total_paid) as total_due')
            )
                ->where('student_collection_details.total_payable', '>=', 'student_collection_details.total_paid')
                ->leftJoin('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_collections', 'student_collections.student_id', '=', 'students.id')
                ->leftJoin('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
                ->leftJoin('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
                ->leftJoin('student_collection_details_sub_heads as scds', 'student_collection_details.id', '=', 'scds.student_collection_details_id')
                ->leftJoin('fee_sub_heads', 'scds.sub_head_id', '=', 'fee_sub_heads.id')
                ->whereYear('student_collections.invoice_date', $year)
                ->groupBy('students.id', 'student_sessions.roll');

            if (!empty($section)) {
                $dues->where('student_sessions.section_id', $section);
            }
            $unpaidInfos = $dues->get();
            if ($unpaidInfos && count($unpaidInfos) > 0) {
                return view('backend.fee_collection_report.partials.unpaid-info', compact('unpaidInfos'));
            }
        }

        return view('backend.fee_collection_report.unpaid-info');
    }

    /**
     * Update the specified resource in storage.
     */
    public function getPaymentRatioInfo(Request $request)
    {
        $year = $request->year;
        $feeHead = $request->fee_head;
        if (!empty($year)) {
            $query = DB::table('classes')
                ->select(
                    'classes.class_name',
                    DB::raw('COUNT(students.id) as total_students'),
                    DB::raw('COUNT(DISTINCT CASE WHEN student_collection_details.total_paid > 0 THEN students.id END) as paid_students'),
                    DB::raw('CONCAT(ROUND(COUNT(DISTINCT CASE WHEN student_collection_details.total_paid > 0 THEN students.id END) / COUNT(students.id) * 100, 2), "%") as paid_percentage'),
                    DB::raw('COUNT(DISTINCT CASE WHEN student_collection_details.total_paid = 0 THEN students.id END) as unpaid_students'),
                    DB::raw('CONCAT(ROUND(COUNT(DISTINCT CASE WHEN student_collection_details.total_paid = 0 THEN students.id END) / COUNT(students.id) * 100, 2), "%") as unpaid_percentage')
                )
                ->leftJoin('student_collections', 'student_collections.class_id', '=', 'classes.id')
                ->leftJoin('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
                ->leftJoin('students', 'student_collection_details.student_id', '=', 'students.id')
                ->whereYear('student_collections.invoice_date', $year)
                ->groupBy('classes.class_name');

            if (!empty($feeHead)) {
                $query->where('student_collection_details.fee_head_id', $feeHead);
            }

            $payments = $query->get();

            if ($payments && count($payments) > 0) {
                return view('backend.fee_collection_report.partials.payment-ratio-info', compact('payments'));
            }
        }

        return view('backend.fee_collection_report.payment-ratio-info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getPaymentInfo(Request $request)
    {
        $section_id = $request->section_id;
        $year = $request->year;

        $students = DB::table('students')
            ->select(
                'students.id as student_id',
                'student_sessions.roll as roll',
                DB::raw('CONCAT(students.first_name, " ", COALESCE(students.last_name, "")) as name'),
                DB::raw('(SELECT SUM(total_paid) FROM student_collections WHERE student_id = students.id) as `paid_amount`')
            )
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->join('student_collections', 'students.id', '=', 'student_collections.student_id')
            ->whereYear('student_collections.invoice_date', $year)
            ->orWhere('student_sessions.section_id', $section_id)
            ->groupBy('students.id')
            ->get();

        return view('backend.fee_collection_report.payment-fee-info', compact('students'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getPaymentInfoDetails($id)
    {
        $studentId = $id;

        // $studentCollections = StudentCollection::join('student_collection_details_sub_heads', 'student_collection_details_sub_heads.student_collection_id', '=', 'student_collections.id')
        //     ->join('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
        //     ->join('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
        //     ->rightJoin('fee_sub_heads', 'student_collection_details_sub_heads.sub_head_id', '=', 'fee_sub_heads.id')
        //     ->where('student_collections.student_id', $studentId)
        //     ->select(
        //         'student_collections.invoice_id',
        //         'fee_heads.name as fee_head',
        //         'fee_sub_heads.name as fee_sub_head',
        //         'student_collection_details.total_paid',
        //         'student_collection_details.total_due',
        //         // 'student_collection_details.status'
        //     )
        //     ->groupBy('student_collections.invoice_id')
        //     ->get();
        $studentCollections = StudentCollection::with(['details' => function ($q) {
            return $q->with('feeHead', 'subHeads');
        }])->where('student_id', $studentId)
            // ->groupBy('student_collections.invoice_id')
            ->get();
        return view('backend.fee_collection_report.partials.payment-details-info', compact('studentCollections'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function getHeadWisePayment(Request $request)
    {
        $section = $request->section_id;
        $year = $request->year;

        $headWisePayment = Student::join('student_collections', 'students.id', '=', 'student_collections.student_id')
            ->join('student_sessions', 'student_sessions.id', '=', 'student_collections.session_id')
            ->join('student_collection_details', 'student_collection_details.student_id', '=', 'students.id')
            ->join('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
            ->select(
                'students.id as student_id',
                'students.first_name',
                'students.last_name',
                'student_sessions.roll',
                DB::raw('(Select SUM(total_paid) from student_collections where student_id=students.id) as total_paid'),
                'student_collections.invoice_id',
                'student_collections.invoice_date',
                'fee_heads.name as fee_head_name',
                DB::raw('(Select SUM(total_paid) from student_collection_details where student_collection_details.fee_head_id=fee_heads.id) as fee_total_paid'),
            )
            ->whereYear('student_collections.invoice_date', $year)
            ->orWhere('student_sessions.section_id', $section)
            ->groupBy('students.id')
            ->get();

        if ($headWisePayment && count($headWisePayment) > 0) {
            return view('backend.fee_collection_report.partials.head-wise-payment', compact('headWisePayment'));
        }


        return view('backend.fee_collection_report.head-wise-payment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getSubHeadWisePayment(Request $request)
    {
        $section = $request->section_id;
        $year = $request->year;
        $fee_head = $request->fee_head_id;

        $headWiseDue = Student::join('student_collections', 'students.id', '=', 'student_collections.student_id')
            ->join('student_sessions', 'student_sessions.id', '=', 'student_collections.session_id')
            ->join('student_collection_details', 'student_collection_details.student_id', '=', 'students.id')
            ->join('student_collection_details_sub_heads as scds', 'scds.student_id', '=', 'students.id')
            ->join('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
            ->join('fee_sub_heads', 'scds.sub_head_id', '=', 'fee_sub_heads.id')
            ->select(
                'students.id as student_id',
                'students.first_name',
                'students.last_name',
                'student_sessions.roll',
                'student_collections.id as collection_id',
                // DB::raw('(Select total_due from student_collections where id=scds.student_collection_id and fee_sub_heads.id=scds.sub_head_id) as sub_head_due'),
                // 'student_collections.invoice_id',
                // 'student_collections.invoice_date',
                'fee_sub_heads.name as fee_sub_head_name',
                'fee_sub_heads.id as sub_id',
                // DB::raw('(Select SUM(total_due) from student_collection_details where student_collection_details.student_id=students.id) as total_due'),
            )
            ->whereYear('student_collections.invoice_date', $year)
            ->orWhere('student_sessions.section_id', $section)
            ->orWhere('fee_heads.id', $fee_head)
            ->groupBy('fee_sub_heads.id', 'students.id')
            ->get();

        foreach ($headWiseDue as $data) {
            $due = StudentCollection::where('id', $data->collection_id)->first();
        }
        if ($headWiseDue && count($headWiseDue) > 0) {
            return view('backend.fee_collection_report.partials.head-wise-due', compact('headWiseDue'));
        }


        return view('backend.fee_collection_report.head-wise-due');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getPaidFees(Request $request)
    {
        $year = $request->year;
        $section = $request->section_id;
        $fromdate = $request->fromDate;
        $todate = $request->toDate;
        $paymentMethodId = $request->paymentMethodId;
        $result = [];
        if (!empty($year)) {
            $invoiceData = DB::table('student_collections')
                ->join('students', 'student_collections.student_id', '=', 'students.id')
                ->join('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
                ->join('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
                ->join('student_sessions', 'student_collections.session_id', '=', 'student_sessions.id')
                ->leftJoin('student_collection_details_sub_heads', 'student_collection_details.id', '=', 'student_collection_details_sub_heads.student_collection_details_id')
                ->leftJoin('fee_sub_heads', 'student_collection_details_sub_heads.sub_head_id', '=', 'fee_sub_heads.id')
                ->leftJoin('accounting_ledgers', 'student_collections.ledger_id', '=', 'accounting_ledgers.id')
                // ->leftJoin('payment_methods', 'student_sessions.id', '=', 'payment_methods.session_id')
                ->select(
                    'student_collections.invoice_id',
                    DB::raw('CONCAT(students.first_name, " ", students.last_name) as student_name'),
                    'students.roll_no as roll',
                    'fee_heads.name as fee_head_name',
                    'fee_sub_heads.name as fee_sub_head_name',
                    // DB::raw('GROUP_CONCAT(fee_sub_heads.name SEPARATOR ", ") as fee_sub_heads'),
                    'accounting_ledgers.ledger_name',
                    // 'payment_methods.name as payment_method',
                    'student_collections.invoice_date as year',
                    'student_collections.invoice_date',
                    'student_sessions.section_id',
                    'student_collections.total_payable as payable_amount',
                    'student_collections.total_paid as paid_amount',
                    'student_collections.total_due as due_amount'
                );

            // Apply additional filters
            if ($year) {
                $invoiceData->whereYear('student_collections.invoice_date', $year);
            }

            if ($fromdate) {
                $invoiceData->where('student_collections.invoice_date', '>=', $fromdate);
            }

            if ($todate) {
                $invoiceData->where('student_collections.invoice_date', '<=', $todate);
            }

            if ($section) {
                $invoiceData->where('students.section', $section);
            }

            if ($paymentMethodId) {
                $invoiceData->where('student_collections.payment_method_id', $paymentMethodId);
            }

            $result = $invoiceData->groupBy('student_collections.invoice_id')->get();
        }


        // Use $result as needed

        if ($result && count($result) > 0) {
            return view('backend.fee_collection_report.partials.paid-invoice', compact('result'));
        }


        return view('backend.fee_collection_report.paid-invoice');
    }

    public function getUnpaidFeeSummery(Request $request)
    {
        $year = $request->year;
        $section = $request->section;

        if (!empty($year)) {
            $dues = Student::select(
                'students.id as student_id',
                'students.first_name',
                'student_sessions.roll',
                DB::raw('GROUP_CONCAT(
    DISTINCT 
    CASE 
        WHEN (student_collection_details.total_payable - student_collection_details.total_paid) <> 0 
        THEN CONCAT(fee_heads.name, " : ", fee_sub_heads.name, "(", student_collection_details.total_paid - student_collection_details.total_payable, ")")
    END
    ORDER BY fee_sub_heads.id ASC
    SEPARATOR ", "
) as due_details'),
                DB::raw('SUM(student_collection_details.fee_and_fine_payable - student_collection_details.fee_and_fine_paid) as total_fee_due'),
                DB::raw('SUM(student_collection_details.previous_due_payable - student_collection_details.previous_due_paid) as total_slip_due'),
                DB::raw('SUM(student_collection_details.total_payable - student_collection_details.total_paid) as total_due')
            )
                ->where('student_collection_details.total_payable', '>=', 'student_collection_details.total_paid')
                ->leftJoin('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_collections', 'student_collections.student_id', '=', 'students.id')
                ->leftJoin('student_collection_details', 'student_collections.id', '=', 'student_collection_details.student_collection_id')
                ->leftJoin('fee_heads', 'student_collection_details.fee_head_id', '=', 'fee_heads.id')
                ->leftJoin('student_collection_details_sub_heads as scds', 'student_collection_details.id', '=', 'scds.student_collection_details_id')
                ->leftJoin('fee_sub_heads', 'scds.sub_head_id', '=', 'fee_sub_heads.id')
                ->whereYear('student_collections.invoice_date', $year)
                ->groupBy('students.id', 'student_sessions.roll');

            if (!empty($section)) {
                $dues->where('student_sessions.section_id', $section);
            }
            $unpaidInfos = $dues->get();
            if ($unpaidInfos && count($unpaidInfos) > 0) {
                return view('backend.fee_collection_report.partials.unpaid-summery', compact('unpaidInfos'));
            }
        }
        if (!empty($year) && !empty($section)) {
            session()->flash(
                'error',
                __('No data found')
            );
        }
        return view('backend.fee_collection_report.unpaid-summery');
    }
}
