<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Services\BankAccountService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AccountingFundCreateRequest;

class BankAccountController extends Controller
{
    public function __construct(
        private readonly BankAccountService $bankAccountService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.digital_banking.list', [
            'bank_accounts' => $this->bankAccountService->getBankAccounts(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view('backend.digital_banking.create');
        } else {
            return view('backend.digital_banking.modal.create');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'acc_holder_name' => 'required|max:50',
            'account_no' => 'required',
            'balance' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect('bank-accounts/create')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $bankAccount = new BankAccount();
        $bankAccount->acc_holder_name = $request->input('acc_holder_name');
        $bankAccount->bank = $request->input('bank');
        $bankAccount->branch = $request->input('branch');
        $bankAccount->account_no = $request->input('account_no');
        $bankAccount->balance = $request->input('balance');
        $bankAccount->save();

        if (!$request->ajax()) {
            return redirect('bank-accounts/create')->with('success', _lang('Information has been added successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $bankAccount]);
        }

        // $fee_head = $this->bankAccountService->createBankAccount($request->validated());

        // if (!$fee_head) {
        //     return response()->json(['result' => 'error', 'message' => _lang('Something went wrong. BankAccount can not be submitted.')]);
        // }

        // // if (!$fee_head) {
        // //     return redirect('fee-head')->with('error', _lang('Something went wrong. BankAccount can not be submitted.'));
        // // }

        // // return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $fee_head]);
        // return redirect('fee-head')->with('success', _lang('BankAccount application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $department = $this->bankAccountService->findBankAccountById($id);

        if (!$department) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. BankAccount can not be edit.'));
        }

        return view('backend.digital_banking.edit', [
            'department' => $department
        ]);
    }

    public function update(AccountingFundCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $department = $this->bankAccountService->findBankAccountById($id);

        if (!$department) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. BankAccount can not be update.'));
        }

        $this->bankAccountService->updateBankAccount($request->validated(), $id);

        return redirect('fee-head')->with('success', _lang('Information has been added'));
    }

    public function destroy($id)
    {
        $bankAccount = BankAccount::where('id', $id)->first();

        if(!empty($bankAccount))
        {
            $bankAccount->delete();
            return redirect('bank-accounts')->with('success', _lang('Successfully Bank Account Deleted.'));
        }else{
            return redirect('bank-accounts')->with('error', _lang('Something went wrong.'));
        }
    }

    // public function destroy($id): Redirector|RedirectResponse
    // {
    //     $fee_head = $this->bankAccountService->deleteBankAccountById($id);

    //     if (!$fee_head) {
    //         return redirect('fee-head')->with('error', _lang('Something went wrong. BankAccount can not be delete.'));
    //     }

    //     return redirect('fee-head')->with('success', _lang('Information has been deleted'));
    // }
}
