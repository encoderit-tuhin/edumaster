<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;

class AccountUserWiseTransferController extends Controller
{
    public function index(Request $request): View|Factory
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $transactions = AccountTransaction::query()
            ->select('account_transactions.*', 'account_transaction_details.*', 'accounting_ledgers.ledger_name')
            ->join('account_transaction_details', 'account_transaction_details.account_transactions_id', '=', 'account_transactions.id')
            ->leftJoin('accounting_ledgers', 'accounting_ledgers.id', '=', 'account_transaction_details.ledger_id')
            ->whereBetween('account_transactions.transaction_date', [$fromDate, $toDate])
            ->where('account_transactions.created_by', Auth::id())
            ->orderBy('account_transactions.id', 'DESC')->get();
        if ($transactions && count($transactions)>0) {
            return view('backend.accounting-report.transaction.user-wise', compact('fromDate', 'toDate', 'transactions'));
        } else {
            return view('backend.user_wise.index', compact('fromDate', 'toDate', 'transactions'));

        }
    }

    public function show($id)
    {
        return $id;
    }

    public function destroy($id)
    {
        return $id;
    }
}
