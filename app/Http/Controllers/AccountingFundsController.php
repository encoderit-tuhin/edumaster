<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountingFundService;
use App\Http\Requests\AccountingFundCreateRequest;

class AccountingFundsController extends Controller
{
    public function __construct(private readonly AccountingFundService $accountingFundService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.accounting_funds.index', [
            'accountingFunds' => $this->accountingFundService->getAccountingFunds(),
        ]);
    }

    public function store(AccountingFundCreateRequest $request): Redirector|RedirectResponse
    {
        $accountingFund = $this->accountingFundService->createAccountingFund($request->validated());

        if (!$accountingFund) {
            return redirect('accounting-funds')->with('error', _lang('Something went wrong. Accounting Fund can not be submitted.'));
        }

        return redirect('accounting-funds')->with('success', _lang('Accounting Fund application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $accountingFund = $this->accountingFundService->findAccountingFundById($id);

        if (!$accountingFund) {
            return redirect('accounting-funds')->with('error', _lang('Something went wrong. Accounting Fund can not be edit.'));
        }

        return view('backend.accounting_funds.edit', [
            'accountingFund' => $accountingFund
        ]);
    }

    public function update(AccountingFundCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $accountingFund = $this->accountingFundService->findAccountingFundById($id);

        if (!$accountingFund) {
            return redirect('accounting-funds')->with('error', _lang('Something went wrong. Accounting Fund can not be update.'));
        }

        $this->accountingFundService->updateAccountingFund($request->validated(), $id);

        return redirect('accounting-funds')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $accountingFund = $this->accountingFundService->deleteAccountingFundById($id);

        if (!$accountingFund) {
            return redirect('accounting-funds')->with('error', _lang('Something went wrong. Accounting Fund can not be delete.'));
        }

        return redirect('accounting-funds')->with('success', _lang('Information has been deleted'));
    }
}
