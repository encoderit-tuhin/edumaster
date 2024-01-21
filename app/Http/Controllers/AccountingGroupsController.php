<?php

namespace App\Http\Controllers;

use App\AccountingGroup;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountingGroupService;
use App\Http\Requests\AccountingGroupCreateRequest;

class AccountingGroupsController extends Controller
{
    public function __construct(private readonly AccountingGroupService $accountingGroupService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.accounting_groups.index', [
            'accountingGroups' => $this->accountingGroupService->getAccountingGroups(),
        ]);
    }

    public function store(AccountingGroupCreateRequest $request): Redirector|RedirectResponse
    {
        $accountingGroup = $this->accountingGroupService->createAccountingGroup($request->validated());

        if (!$accountingGroup) {
            return redirect('accounting-groups')->with('error', _lang('Something went wrong. Accounting Group can not be submitted.'));
        }

        return redirect('accounting-groups')->with('success', _lang('Accounting Group application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $accountingGroup = $this->accountingGroupService->findAccountingGroupById($id);

        if (!$accountingGroup) {
            return redirect('accounting-groups')->with('error', _lang('Something went wrong. Accounting Group can not be edit.'));
        }

        return view('backend.accounting_groups.edit', [
            'accountingGroup' => $accountingGroup
        ]);
    }

    public function update(AccountingGroupCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $accountingGroup = $this->accountingGroupService->findAccountingGroupById($id);

        if (!$accountingGroup) {
            return redirect('accounting-groups')->with('error', _lang('Something went wrong. Accounting Group can not be update.'));
        }

        $this->accountingGroupService->updateAccountingGroup($request->validated(), $id);

        return redirect('accounting-groups')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $accountingGroup = $this->accountingGroupService->deleteAccountingGroupById($id);

        if (!$accountingGroup) {
            return redirect('accounting-groups')->with('error', _lang('Something went wrong. Accounting Group can not be delete.'));
        }

        return redirect('accounting-groups')->with('success', _lang('Information has been deleted'));
    }

    public function getAccountGroups($id)
    {
        // Fetch account groups based on the selected category
        $accountGroups = AccountingGroup::where('accounting_category_id', $id)->orderBy('name', 'asc')->pluck('name', 'id')->toArray();

        // Return the account groups as JSON
        return response()->json($accountGroups);
    }
}
