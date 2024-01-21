<?php

namespace App\Http\Controllers;

use App\AccountingFund;
use App\AccountingLedger;
use App\Enums\VoucherType;
use App\AccountTransaction;
use App\AccountTransactionDetail;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Traits\AccountingCalculationTrait;
use App\Services\AccountTransactionService;
use App\Http\Requests\AccountTransactionCreateRequest;

class AccountTransactionsController extends Controller
{
    use AccountingCalculationTrait;

    public function __construct(
        private readonly AccountTransactionService $accountTransactionService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.account_transactions.index', [
            'type' => request()->type ?? VoucherType::PAYMENT,
        ]);
    }

    public function store(AccountTransactionCreateRequest $request): Redirector|RedirectResponse
    {
        try {
            DB::beginTransaction();
            $ledgerIds = $request->ledger_ids ?? [];
            $amounts = $request->amounts;

            // Find accounting category ID from ledger_id.
            // TODO: payment_method_id should be changed to from_ledger_id or something like that.
            $categoryId = AccountingLedger::where('id', $request->payment_method_id)->first()->accounting_category_id ?? null;

            $accountTransaction = new AccountTransaction();
            $accountTransaction->voucher_id = $this->generateVoucherId();
            $accountTransaction->fund_id = $request->fund_id;
            $accountTransaction->transaction_date = $request->transaction_date;
            $accountTransaction->payment_method_id = $request->payment_method_id;
            $accountTransaction->category_id = $categoryId;
            $accountTransaction->type = $request->type;
            $accountTransaction->reference = $request->reference;
            $accountTransaction->description = $request->description;
            $accountTransaction->created_by = Auth::id();
            $accountTransaction->save();

            $totalAmount = 0;
            foreach ($ledgerIds as $key => $ledgerId) {
                $amount = (float) $amounts[$key];
                $totalAmount += $amount;

                $type = $request->type;
                $debit = ($type === 'payment') ? $amount : 0;
                $credit = ($type === 'receipt') ? $amount : 0;

                $transactionDetail = new AccountTransactionDetail();
                $transactionDetail->account_transactions_id = $accountTransaction->id;
                $transactionDetail->ledger_id = $ledgerId;
                $transactionDetail->fund_id = $request->fund_id;
                $transactionDetail->payment_method_id = $request->payment_method_id;
                $transactionDetail->transaction_date = $request->transaction_date;
                $transactionDetail->debit = $debit;
                $transactionDetail->credit = $credit;
                $transactionDetail->save();
            }

            DB::commit();
            return redirect('account-transaction-payment')->with('success', _lang('Account transaction has been submitted.'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('account-transaction-payment')->with('error', _lang('Something went wrong !'));
        }
    }
}
