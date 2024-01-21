<?php

namespace App\Http\Controllers;

use App\AccountingFund;
use App\AccountTransaction;
use Illuminate\Http\Request;
use App\AccountTransactionDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountTransactionService;

class AccountFundTransferController extends Controller
{
    public function __construct(
        private readonly AccountTransactionService $accountTransactionService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.fund_transfer.index');
    }

    public function store(Request $request)
    {
        $amount = $request->amount;
        if ($request->fund_id !== $request->fund_to_id) {
            $accountTransaction = new AccountTransaction();
            $accountTransaction->voucher_id = (int) sprintf('%016d', rand(0, 9999999999999999));
            $accountTransaction->category_id = 1;
            $accountTransaction->fund_id = $request->fund_id;
            $accountTransaction->fund_to_id = $request->fund_to_id;
            $accountTransaction->transaction_date = $request->transaction_date;
            $accountTransaction->type = $request->type;
            $accountTransaction->reference = $request->reference;
            $accountTransaction->description = $request->description;
            $accountTransaction->created_by = Auth::id();
            $accountTransaction->save();

            $fundOne = AccountingFund::where('id', $request->fund_id)->first();
            if ($fundOne) {
                $newBalance = $fundOne->balance - $amount;
                $fundOne->balance = $newBalance;
                $fundOne->save();
            }

            $transactionDetail = new AccountTransactionDetail();
            $transactionDetail->fund_id = $request->fund_id;
            $transactionDetail->fund_to_id = $request->fund_to_id;
            $transactionDetail->transaction_date = $request->transaction_date;
            $transactionDetail->debit = $amount;
            $transactionDetail->save();

            $fundTwo = AccountingFund::where('id', $request->fund_to_id)->first();
            if ($fundTwo) {
                $newBalance = $fundTwo->balance + $amount;
                $fundTwo->balance = $newBalance;
                $fundTwo->save();
            }
            $transactionDetail = new AccountTransactionDetail();
            $transactionDetail->fund_id = $request->fund_id;
            $transactionDetail->fund_to_id = $request->fund_to_id;
            $transactionDetail->transaction_date = $request->transaction_date;
            $transactionDetail->credit = $amount;
            $transactionDetail->save();

            return redirect('account-fund-transfers')->with('success', _lang('Fund balance transfer transaction has been submitted.'));
        }

        return back();
    }
}
