<?php

namespace App\Http\Controllers;

use App\Services\FeeHeadService;
use App\Services\FeeWaiverService;
use Illuminate\Routing\Redirector;
use App\Services\FeeSubHeadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\AccountingFundCreateRequest;

class FeeHeadController extends Controller
{
    public function __construct(
        private readonly FeeHeadService $feeHeadService,
        private readonly FeeSubHeadService $feeSubHeadService,
        private readonly FeeWaiverService $feeWaiverService,
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.fees_page.index', [
            'fee_heads' => $this->feeHeadService->getFeeHeads(),
            'fee_sub_heads' => $this->feeSubHeadService->getFeeSubHeads(),
            'fee_waivers' => $this->feeWaiverService->getFeeWaivers(),
        ]);
    }

    public function store(AccountingFundCreateRequest $request)
    {
        $fee_head = $this->feeHeadService->createFeeHead($request->validated());

        if (!$fee_head) {
            return response()->json(['result' => 'error', 'message' => _lang('Something went wrong. FeeHead can not be submitted.')]);
        }

        return redirect('fee-head')->with('success', _lang('FeeHead application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $department = $this->feeHeadService->findFeeHeadById($id);

        if (!$department) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeHead can not be edit.'));
        }

        return view('backend.departments.edit', [
            'department' => $department
        ]);
    }

    public function update(AccountingFundCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $department = $this->feeHeadService->findFeeHeadById($id);

        if (!$department) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeHead can not be update.'));
        }

        $this->feeHeadService->updateFeeHead($request->validated(), $id);

        return redirect('fee-head')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $fee_head = $this->feeHeadService->deleteFeeHeadById($id);

        if (!$fee_head) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeHead can not be delete.'));
        }

        return redirect('fee-head')->with('success', _lang('Information has been deleted'));
    }
}
