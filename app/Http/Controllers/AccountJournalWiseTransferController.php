<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountTransactionService;

class AccountJournalWiseTransferController extends Controller
{
    public function __construct(
        private readonly AccountTransactionService $accountTransactionService
    ) {
    }

    public function index(Request $request): View|Factory
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $type = $request->input('type');

        $query = AccountTransaction::query()
            ->select('account_transactions.*', 'account_transaction_details.*', 'accounting_ledgers.ledger_name')
            ->join('account_transaction_details', 'account_transaction_details.account_transactions_id', '=', 'account_transactions.id')
            ->leftJoin('accounting_ledgers', 'accounting_ledgers.id', '=', 'account_transaction_details.ledger_id')
            ->whereBetween('account_transactions.transaction_date', [$fromDate, $toDate]);

        if (
            $type !== 'All'
        ) {
            $query->where('account_transactions.type', $type);
        }

        $transactions = $query->orderBy('account_transactions.id', 'DESC')->get();

        return view('backend.voucher_wise.index', compact('fromDate', 'toDate', 'type', 'transactions'));
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
