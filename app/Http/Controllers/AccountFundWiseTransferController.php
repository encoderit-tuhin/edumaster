<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountTransactionService;

class AccountFundWiseTransferController extends Controller
{
    public function __construct(
        private readonly AccountTransactionService $accountTransactionService
    ) {
    }

    public function index(Request $request): View|Factory
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $transactions = AccountTransaction::query()
            ->select('account_transactions.*', 'account_transaction_details.*', 'accounting_funds.name as fund_name')
            ->join('account_transaction_details', 'account_transaction_details.account_transactions_id', '=', 'account_transactions.id')
            ->leftJoin('accounting_funds', 'accounting_funds.id', '=', 'account_transaction_details.fund_id')
            ->whereBetween('account_transactions.transaction_date', [$fromDate, $toDate])
            ->orderBy('account_transactions.id', 'ASC')->get();
            if ($transactions &&count($transactions)>0) {
                return view('backend.accounting-report.transaction.fund-wise', compact('fromDate', 'toDate', 'transactions'));

            }

        return view('backend.fund_wise.index', compact('fromDate', 'toDate', 'transactions'));
    }
}
