<?php

namespace App\Http\Controllers;

use App\Services\FeeWaiverService;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\AccountingFundCreateRequest;

class FeeWaiverController extends Controller
{
    public function __construct(private readonly FeeWaiverService $feeWaiverService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.fees_page.index', [
            'feeWaivers' => $this->feeWaiverService->getFeeWaivers(),
        ]);
    }

    public function store(AccountingFundCreateRequest $request)
    {
        $fee_waiver = $this->feeWaiverService->createFeeWaiver($request->validated());

        if (!$fee_waiver) {
            return response()->json(['result' => 'error', 'message' => _lang('Something went wrong. FeeWaiver can not be submitted.')]);
        }

        return redirect('fee-head')->with('success', _lang('FeeWaiver application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $feeWaiver = $this->feeWaiverService->findFeeWaiverById($id);

        if (!$feeWaiver) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeWaiver can not be edit.'));
        }

        return view('backend.feeWaivers.edit', [
            'feeWaiver' => $feeWaiver
        ]);
    }

    public function update(AccountingFundCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $feeWaiver = $this->feeWaiverService->findFeeWaiverById($id);

        if (!$feeWaiver) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeWaiver can not be update.'));
        }

        $this->feeWaiverService->updateFeeWaiver($request->validated(), $id);

        return redirect('fee-head')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $feeWaiver = $this->feeWaiverService->deleteFeeWaiverById($id);

        if (!$feeWaiver) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeWaiver can not be delete.'));
        }

        return redirect('fee-head')->with('success', _lang('Information has been deleted'));
    }
}
