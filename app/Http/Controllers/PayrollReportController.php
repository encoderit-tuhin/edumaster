<?php

namespace App\Http\Controllers;

use App\UserPayroll;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayrollReportController extends Controller
{
    //

    function salaryStatementReport(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $data = UserPayroll::select('payslip_salaries.*', 'user_payrolls.*', 'payments.*')
            ->join('payslip_salaries', 'payslip_salaries.user_id', 'user_payrolls.user_id')
            ->join('payments', 'payments.user_id', 'user_payrolls.user_id')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->with('user')
            ->get();

        if ($data && count($data) > 0) {
            return view('backend.payroll-report.salary-statement-report', compact('data'));

        }
        session()->flash('error', 'No Data Found');
        return view('backend.payroll-report.salary-statement');

    }
    public function getPaymentInfo(Request $request)
    {

        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $hrPayments = User::whereIn('user_type', ['Staff', 'Admin'])
            ->join('user_payrolls', 'users.id', '=', 'user_payrolls.user_id')
            ->leftJoin('payslip_salaries', function ($join) use ($fromDate, $toDate) {
                $join->on('users.id', '=', 'payslip_salaries.user_id')
                    ->whereBetween('payslip_salaries.payment_date', [$fromDate, $toDate]);
            })
            ->leftJoin('payments', function ($join) use ($fromDate, $toDate) {
                $join->on('users.id', '=', 'payments.user_id')
                    ->whereBetween('payments.created_at', [$fromDate, $toDate]);
            })
            ->leftJoin('payslip_invoices', 'payslip_salaries.id', '=', 'payslip_invoices.payslip_salary_id')
            ->select([
                'users.id as hr_id',
                'users.name as hr_name',
                'payslip_invoices.invoice_id as invoice_id',
                'payslip_salaries.is_paid',
                'payments.type as payment_type',
                'user_payrolls.net_salary',
                DB::raw('user_payrolls.net_salary - IF(payslip_salaries.paid_amount IS NOT NULL, payslip_salaries.paid_amount, 0) as payable_salary'),
                DB::raw('IF(payslip_salaries.paid_amount IS NOT NULL, payslip_salaries.paid_amount, 0) as paid'),
                'user_payrolls.current_due as due',
                'user_payrolls.current_advance as advance',
                'payslip_salaries.payment_date',
            ])
            ->get();


        if ($hrPayments && count($hrPayments) > 0) {
            return view('backend.payroll-report.partials.payment-info-report', compact('hrPayments'));
        }

        return view('backend.payroll-report.payment-info');
    }
}
