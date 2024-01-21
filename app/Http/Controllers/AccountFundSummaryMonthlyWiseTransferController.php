<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class AccountFundSummaryMonthlyWiseTransferController extends Controller
{
    public function index(Request $request): View|Factory
    {
        $year = $request->year;

        $transactions = AccountTransaction::query()
            ->select('account_transactions.*', 'account_transaction_details.*', 'accounting_funds.name as fund_name')
            ->join('account_transaction_details', 'account_transaction_details.account_transactions_id', '=', 'account_transactions.id')
            ->leftJoin('accounting_funds', 'accounting_funds.id', '=', 'account_transaction_details.fund_id')
            ->whereYear('account_transactions.transaction_date', '=', $year)
            ->orderBy('account_transactions.id', 'ASC')
            ->get();
            if ($transactions && count($transactions)>0) {
                return view('backend.accounting-report.transaction.fund-summary-monthly', compact('year', 'transactions'));

            }

        return view('backend.fund_summary_monthly.index', compact('year', 'transactions'));
    }
}
