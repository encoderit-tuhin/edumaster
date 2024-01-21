<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountingLedgerService;
use App\Services\AccountingCategoryService;
use App\Http\Requests\AccountingLedgerCreateRequest;

class AccountingLedgersController extends Controller
{
    public function __construct(
        private readonly AccountingLedgerService $accountingLedgerService,
        private readonly AccountingCategoryService $accountingCategoryService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.accounting_ledgers.index', [
            'accountingLedgers' => $this->accountingLedgerService->getAccountingLedgers(),
            'accountingCategories' => $this->accountingCategoryService->getAccountingCategories(),
        ]);
    }

    public function store(AccountingLedgerCreateRequest $request): Redirector|RedirectResponse
    {
        $accountingLedger = $this->accountingLedgerService->createAccountingLedger($request->validated());

        if (!$accountingLedger) {
            return redirect('accounting-ledgers')->with('error', _lang('Something went wrong. Accounting Ledger can not be submitted.'));
        }

        return redirect('accounting-ledgers')->with('success', _lang('Accounting Ledger application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $accountingLedger = $this->accountingLedgerService->findAccountingLedgerById($id);

        if (!$accountingLedger) {
            return redirect('accounting-ledgers')->with('error', _lang('Something went wrong. Accounting Ledger can not be edit.'));
        }

        return view('backend.accounting_ledgers.edit', [
            'accountingLedger' => $accountingLedger,
            'accountingCategories' => $this->accountingCategoryService->getAccountingCategories(),
        ]);
    }

    public function update(AccountingLedgerCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $accountingLedger = $this->accountingLedgerService->findAccountingLedgerById($id);

        if (!$accountingLedger) {
            return redirect('accounting-ledgers')->with('error', _lang('Something went wrong. Accounting Ledger can not be update.'));
        }

        $this->accountingLedgerService->updateAccountingLedger($request->validated(), $id);

        return redirect('accounting-ledgers')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $accountingLedger = $this->accountingLedgerService->deleteAccountingLedgerById($id);

        if (!$accountingLedger) {
            return redirect('accounting-ledgers')->with('error', _lang('Something went wrong. Accounting Ledger can not be delete.'));
        }

        return redirect('accounting-ledgers')->with('success', _lang('Information has been deleted'));
    }
}
