<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use App\AccountTransaction;
use Illuminate\Http\Request;
use App\AccountTransactionDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountTransactionService;

class AccountContraTransferController extends Controller
{
    public function __construct(
        private readonly AccountTransactionService $accountTransactionService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.contra_transfer.index');
    }

    public function store(Request $request)
    {
        $amount = $request->amount;
        if ($request->payment_method_id !== $request->payment_method_to_id) {
            $accountTransaction = new AccountTransaction();
            $accountTransaction->voucher_id = (int) sprintf('%016d', rand(0, 9999999999999999));
            $accountTransaction->category_id = 1;
            $accountTransaction->payment_method_id = $request->payment_method_id;
            $accountTransaction->payment_method_to_id = $request->payment_method_to_id;
            $accountTransaction->transaction_date = $request->transaction_date;
            $accountTransaction->type = $request->type;
            $accountTransaction->reference = $request->reference;
            $accountTransaction->description = $request->description;
            $accountTransaction->created_by = Auth::id();
            $accountTransaction->save();

            $fundOne = PaymentMethod::where('id', $request->payment_method_id)->first();
            if ($fundOne) {
                $newBalance = $fundOne->balance - $amount;
                $fundOne->balance = $newBalance;
                $fundOne->save();
            }

            $transactionDetail = new AccountTransactionDetail();
            $transactionDetail->payment_method_id = $request->payment_method_id;
            $transactionDetail->payment_method_to_id = $request->payment_method_to_id;
            $transactionDetail->account_transactions_id = $accountTransaction->id;
            $transactionDetail->transaction_date = $request->transaction_date;
            $transactionDetail->debit = $amount;
            $transactionDetail->save();

            $fundTwo = PaymentMethod::where('id', $request->payment_method_to_id)->first();
            if ($fundTwo) {
                $newBalance = $fundTwo->balance + $amount;
                $fundTwo->balance = $newBalance;
                $fundTwo->save();
            }

            $transactionDetail = new AccountTransactionDetail();
            $transactionDetail->payment_method_id = $request->payment_method_id;
            $transactionDetail->payment_method_to_id = $request->payment_method_to_id;
            $transactionDetail->account_transactions_id = $accountTransaction->id;
            $transactionDetail->transaction_date = $request->transaction_date;
            $transactionDetail->credit = $amount;
            $transactionDetail->save();

            return redirect('account-contra-transfers')->with('success', _lang('Contra balance transfer transaction has been submitted.'));
        }

        return back();
    }
}
