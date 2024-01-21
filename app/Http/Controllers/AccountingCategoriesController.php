<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountingCategoryUpdateRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountingCategoryService;
use App\Http\Requests\AccountingCategoryCreateRequest;

class AccountingCategoriesController extends Controller
{
    public function __construct(private readonly AccountingCategoryService $accountingCategoryService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.accounting_categories.index', [
            'accountingCategories' => $this->accountingCategoryService->getAccountingCategories(),
        ]);
    }

    public function store(AccountingCategoryCreateRequest $request): Redirector|RedirectResponse
    {
        $accountingCategory = $this->accountingCategoryService->createAccountingCategory($request->validated());

        if (!$accountingCategory) {
            return redirect('accounting-categories')->with('error', _lang('Something went wrong. Accounting Category can not be submitted.'));
        }

        return redirect('accounting-categories')->with('success', _lang('Accounting Category application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $accountingCategory = $this->accountingCategoryService->findAccountingCategoryById($id);

        if (!$accountingCategory) {
            return redirect('accounting-categories')->with('error', _lang('Something went wrong. Accounting Category can not be edit.'));
        }

        return view('backend.accounting_categories.edit', [
            'accountingCategory' => $accountingCategory
        ]);
    }

    public function update(AccountingCategoryUpdateRequest $request, $id): Redirector|RedirectResponse
    {
        $accountingCategory = $this->accountingCategoryService->findAccountingCategoryById($id);

        if (!$accountingCategory) {
            return redirect('accounting-categories')->with('error', _lang('Something went wrong. Accounting Category can not be update.'));
        }

        $this->accountingCategoryService->updateAccountingCategory($request->validated(), $id);

        return redirect('accounting-categories')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $accountingCategory = $this->accountingCategoryService->deleteAccountingCategoryById($id);

        if (!$accountingCategory) {
            return redirect('accounting-categories')->with('error', _lang('Something went wrong. Accounting Category can not be delete.'));
        }

        return redirect('accounting-categories')->with('success', _lang('Information has been deleted'));
    }
}
