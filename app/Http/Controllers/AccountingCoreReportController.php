<?php

namespace app\Http\Controllers;

use App\AccountingLedger;
use App\AccountTransaction;
use Illuminate\Http\Request;
use App\AccountTransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Traits\AccountingCalculationTrait;

class AccountingCoreReportController extends Controller
{
    use AccountingCalculationTrait;

    public function getBalanceSheet(Request $request)
    {
        $startDate = $request->from_date ?? null;
        $endDate = $request->to_date ?? null;
        $ledgers = null;

        $ledgers = AccountTransactionDetail::select([
            'account_transaction_details.ledger_id',
            'accounting_ledgers.ledger_name',
            DB::raw('SUM(account_transaction_details.debit) AS total_debit'),
            DB::raw('SUM(account_transaction_details.credit) AS total_credit')
        ])
            ->join('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
            ->whereBetween('account_transaction_details.transaction_date', [$startDate, $endDate])
            ->groupBy('account_transaction_details.ledger_id', 'accounting_ledgers.ledger_name')->get();

        if ($ledgers && count($ledgers) > 0) {
            return view('backend.accounting-report.core-report.balance-sheet', compact('startDate', 'endDate', 'ledgers'));
        }

        return view('backend.accounting_core_reports.balance_sheet', compact('startDate', 'endDate', 'ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getBalanceSheetDetails(Request $request): View
    {
        $account_details = AccountTransactionDetail::where('ledger_id', $request->ledger_id)->with('accountTransaction')->get();
        return view('backend.accounting_core_reports.partials.balance_sheet_details', compact('account_details'));
    }

    /**
     * Display a listing of the resource.
     */
    public function getTrialBalance(Request $request)
    {
        $startDate = $request->from_date ?? null;
        $endDate = $request->to_date ?? null;
        $ledgers = null;

        $ledgers = AccountTransactionDetail::select([
            'account_transaction_details.ledger_id',
            'accounting_ledgers.ledger_name',
            DB::raw('SUM(account_transaction_details.debit) AS total_debit'),
            DB::raw('SUM(account_transaction_details.credit) AS total_credit')
        ])
            ->join('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
            ->whereBetween('account_transaction_details.transaction_date', [$startDate, $endDate])
            ->groupBy('account_transaction_details.ledger_id', 'accounting_ledgers.ledger_name')->get();

        if ($ledgers && count($ledgers) > 0) {
            return view('backend.accounting-report.core-report.trial-balance-overview', compact('startDate', 'endDate', 'ledgers'));
        }

        return view('backend.accounting_core_reports.trial_balance', compact('startDate', 'endDate', 'ledgers'));
    }

    /**
     * Display a listing of the resource.
     */
    public function getCashFlowStatement(Request $request)
    {
        $year = $request->year; // Adjust the start date as needed

        $cashFlowStatement = DB::table('account_transactions')
            ->join('account_transaction_details', 'account_transactions.id', '=', 'account_transaction_details.account_transactions_id')
            ->whereYear('transaction_date', $year)
            ->select(
                'account_transactions.id as id',
                DB::raw('DATE_FORMAT(transaction_date, "%M") as month'),
                DB::raw('YEAR(transaction_date) as year'),
                DB::raw('SUM(debit) as total_debit'),
                DB::raw('SUM(credit) as total_credit')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        if ($cashFlowStatement && count($cashFlowStatement) > 0) {
            return view('backend.accounting-report.core-report.cash_flow_statement', compact('cashFlowStatement'));
        }

        return view('backend.accounting_core_reports.cash_flow_statement');
    }

    public function getIncomeStatement(Request $request)
    {
        $fromDate = $request['from_date'] ?? date('Y-m-d');

        $toDate = $request['to_date'] ?? date('Y-m-d');
        $ledgerId = $request['ledger_id'] ?? null;

        $query = AccountTransactionDetail::select([
            'account_transaction_details.ledger_id',
            'account_transaction_details.account_transactions_id',
            'accounting_ledgers.ledger_name',
            DB::raw('SUM(account_transaction_details.debit) AS total_debit'),
            DB::raw('SUM(account_transaction_details.credit) AS total_credit')
        ])
            ->join('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
            ->whereBetween('account_transaction_details.transaction_date', [$fromDate, $toDate])
            ->groupBy('account_transaction_details.ledger_id', 'accounting_ledgers.ledger_name');

        if (!empty($ledgerId)) {
            $query->where('account_transaction_details.ledger_id', $ledgerId);
        }

        $ledgers = $query->get();
        // dd($ledgers);
        $income = $ledgers->where('total_debit', '0.00')->all();
        $expense = $ledgers->where('total_credit', '0.00')->all();

        if ($ledgers && count($ledgers) > 0) {
            return view('backend.accounting-report.core-report.income-statement', compact('fromDate', 'toDate', 'ledgers', 'income', 'expense'));
        }

        return view('backend.accounting_core_reports.income-statement');
    }

    public function getIncomeStatementDetails(Request $request)
    {

        $fromDate = $request['from_date'] ?? date('Y-m-d');

        $toDate = $request['to_date'] ?? date('Y-m-d');
        $ledgerId = $request['ledger_id'];

        $account_details = AccountTransactionDetail::where('ledger_id', $ledgerId)->with('accountTransaction')->get();

        if ($account_details && count($account_details) > 0) {
            return view('backend.accounting-report.core-report.income-statement-details', compact('fromDate', 'toDate', 'account_details'));
        }

        return view('backend.accounting_core_reports.income-statement');
    }
    public function getCashSummary(Request $request)
    {

        $fromDate = $request['from_date'] ?? date('Y-m-d');

        $toDate = $request['to_date'] ?? date('Y-m-d');
        $ledgerId = $request['ledger_id'] ?? null;

        $query = AccountTransactionDetail::select([
            'account_transaction_details.ledger_id',
            'accounting_ledgers.ledger_name',
            DB::raw('SUM(account_transaction_details.debit) AS total_debit'),
            DB::raw('SUM(account_transaction_details.credit) AS total_credit')
        ])
            ->join('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
            ->whereBetween('account_transaction_details.created_at', [$fromDate, $toDate])
            ->groupBy('account_transaction_details.ledger_id', 'accounting_ledgers.ledger_name');

        if (!empty($ledgerId)) {
            $query->where('account_transaction_details.ledger_id', $ledgerId);
        }

        $ledgers = $query->get();
        $income = $ledgers->where('total_debit', '0.00')->all();
        $expense = $ledgers->where('total_credit', '0.00')->all();

        if ($ledgers && count($ledgers) > 0) {
            return view('backend.accounting-report.core-report.cash-summary', compact('fromDate', 'toDate', 'ledgers', 'income', 'expense'));
        }

        return view('backend.accounting_core_reports.cash-summary');
    }

    /**
     * Display a listing of the resource.
     */
    public function getCashFlowDetails(Request $request)
    {
        $year = $request->year;
        $month = date('n', strtotime($request->month));

        $accountTransactionDetails = DB::table('account_transaction_details')
            ->join('account_transactions', 'account_transactions.id', '=', 'account_transaction_details.account_transactions_id')
            ->whereYear('account_transactions.transaction_date', $year)
            ->whereMonth('account_transactions.transaction_date', $month)
            ->select(
                'account_transaction_details.*',
                'account_transactions.transaction_date'
            )
            ->get();
        if ($accountTransactionDetails && count($accountTransactionDetails) > 0) {
            return view('backend.accounting-report.core-report.partial.cash_flow_details', compact('accountTransactionDetails'));
        }

        // return view('backend.accounting_core_reports.cash_flow_statement', compact('cashFlowStatement'));
    }

    /**
     * Display the specified resource.
     */
    public function getCashBookAccount(Request $request)
    {
        $startDate = $request->from_date;
        $endDate = $request->to_date;

        if (isset($request->method_id)) {
            $cashBookEntries = DB::table('account_transactions')
                ->join('account_transaction_details', 'account_transactions.id', '=', 'account_transaction_details.account_transactions_id')
                ->leftJoin('payment_methods as payment_method', 'account_transactions.payment_method_id', '=', 'payment_method.id')
                ->leftJoin('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
                // ->leftJoin('account_categories', 'account_transactions.category_id', '=', 'account_categories.id')
                ->select(
                    'account_transactions.id',
                    'transaction_date',
                    'account_transactions.type',
                    'reference',
                    'description',
                    'debit',
                    'credit',
                    'payment_method.name as payment_method_name',
                    'accounting_ledgers.ledger_name'
                )
                ->whereBetween('transaction_date', [$startDate, $endDate])
                ->whereIn('account_transaction_details.payment_method_id', $request->method_id)
                ->orderBy('transaction_date')
                ->get();

            if ($cashBookEntries && count($cashBookEntries) > 0) {
                return view('backend.accounting-report.core-report.cash_book', compact('cashBookEntries'));
            }
        }

        return view('backend.accounting_core_reports.book_of_accounts');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function getLedgerBookAccount(Request $request)
    {
        $startDate = $request->input('from_date');
        $endDate = $request->input('to_date');
        $ledger = $request->input('ledger_id');
        if (!empty($ledger)) {
            $ledgerBookEntries = DB::table('account_transactions')
                ->join('account_transaction_details', 'account_transactions.id', '=', 'account_transaction_details.account_transactions_id')
                ->leftJoin('payment_methods as payment_method', 'account_transactions.payment_method_id', '=', 'payment_method.id')
                ->leftJoin('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
                // ->leftJoin('account_categories', 'account_transactions.category_id', '=', 'account_categories.id')
                ->select(
                    'account_transactions.id',
                    'transaction_date',
                    'account_transactions.type',
                    'reference',
                    'account_transactions.voucher_id as voucher_id',
                    'description',
                    'debit',
                    'credit',
                    'payment_method.name as payment_method_name',
                    'accounting_ledgers.ledger_name'
                )
                ->whereBetween('transaction_date', [$startDate, $endDate])
                ->where('account_transaction_details.ledger_id', $ledger)
                ->orderBy('transaction_date')
                ->get();
            if ($ledgerBookEntries && count($ledgerBookEntries) > 0) {
                return view('backend.accounting-report.core-report.ledger_book', compact('ledgerBookEntries'));
            }
        }

        return view('backend.accounting_core_reports.book_of_accounts');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
