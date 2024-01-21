<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class AccountVoucherWiseTransferController extends Controller
{
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
        if ($transactions && count($transactions) > 0) {
            return view('backend.accounting-report.transaction.voucher_wise', compact('fromDate', 'toDate', 'type', 'transactions'));

        }

        return view('backend.voucher_wise.index', compact('fromDate', 'toDate', 'type', 'transactions'));
    }

    public function show($id)
    {
        return $id;
    }
    public function delete()
    {
        return view('backend.voucher_wise.search-voucher');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'voucher_id' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $transaction = AccountTransaction::where('voucher_id', $request->voucher_id)->first();

            if ($transaction) {
                DB::table('account_transaction_details')
                    ->where('account_transactions_id', $transaction->id)
                    ->delete();

                $transaction->delete();
                DB::commit();
                return back()->with('success', 'Voucher Deleted Successfully.');
            } else {
                return back()->with('error', 'Voucher Not Found.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Failed to delete. Error: ' . $e->getMessage());
        }
    }
}
