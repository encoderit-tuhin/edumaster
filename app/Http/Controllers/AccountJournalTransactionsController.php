<?php

namespace App\Http\Controllers;

use App\AccountingFund;
use App\AccountingLedger;
use App\AccountTransaction;
use Illuminate\Http\Request;
use App\AccountTransactionDetail;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountingLedgerService;

class AccountJournalTransactionsController extends Controller
{
    public function __construct(
        private readonly AccountingLedgerService $accountingLedgerService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.journal_transactions.index');
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        $leaderIds = $request->ledger_ids;
        $debits = $request->debits;
        $credits = $request->credits;

        $accountTransaction = new AccountTransaction();
        $accountTransaction->voucher_id = (int) sprintf('%016d', rand(0, 9999999999999999));
        $accountTransaction->category_id = $request->category_id;
        $accountTransaction->fund_id = $request->fund_id;
        $accountTransaction->transaction_date = $request->transaction_date;
        $accountTransaction->type = $request->type;
        $accountTransaction->reference = $request->reference;
        $accountTransaction->description = $request->description;
        $accountTransaction->created_by = Auth::id();
        $accountTransaction->save();

        foreach ($leaderIds as $key => $ledgerId) {
            $debit = $debits[$key];
            $credit = $credits[$key];

            $transactionDetail = new AccountTransactionDetail();
            $transactionDetail->account_transactions_id = $accountTransaction->id;
            $transactionDetail->ledger_id = $ledgerId;
            $transactionDetail->fund_id = $request->fund_id;
            $transactionDetail->transaction_date = $request->transaction_date;
            $transactionDetail->debit = $debit ?? 0;
            $transactionDetail->credit = $credit ?? 0;
            $transactionDetail->save();

            $fund = AccountingFund::where('id', $request->fund_id)->first();
            if ($fund) {
                $fundBalance = $fund->balance + ($credit ?? -$debit);
                $fund->balance = $fundBalance;
                $fund->save();
            }

            $ledgerAccount = AccountingLedger::where('id', $ledgerId)->first();
            if ($ledgerAccount) {
                $leaderBalance = $ledgerAccount->balance + ($credit ?? -$debit);
                $ledgerAccount->balance = $leaderBalance;
                $ledgerAccount->nature = $debit > 0  ? 'debit' : 'credit';
                $ledgerAccount->save();
            }
        }

        return redirect('journal-transactions')->with('success', _lang('Journal Payment transaction has been submitted.'));
    }
    public function report(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $transactions = AccountTransaction::with('transactionDetails.accountingLedger')->get();
        if ($transactions && count($transactions) > 0) {

            // return $transactions;
            // dd( $transactions);
            return view('backend.accounting-report.transaction.account-journal', compact('fromDate', 'toDate', 'transactions'));
        }
        return view('backend.journal_transactions.report');
    }
}
