<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeeSubHeadCreateRequest;
use Illuminate\Routing\Redirector;
use App\Services\FeeSubHeadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\AccountingFundCreateRequest;

class FeeSubHeadController extends Controller
{
    public function __construct(private readonly FeeSubHeadService $feeSubHeadService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.fees_page.index', [
            'fee_sub_heads' => $this->feeSubHeadService->getFeeSubHeads(),
        ]);
    }

    public function store(FeeSubHeadCreateRequest $request)
    {
        $fee_sub_head = $this->feeSubHeadService->createFeeSubHead($request->validated());

        if (!$fee_sub_head) {
            return response()->json(['result' => 'error', 'message' => _lang('Something went wrong. FeeSubHead can not be submitted.')]);
        }

        // if (!$fee_sub_head) {
        //     return redirect('fee-head')->with('error', _lang('Something went wrong. FeeSubHead can not be submitted.'));
        // }

        // return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $fee_sub_head]);
        return redirect('fee-head')->with('success', _lang('FeeSubHead application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $fee_sub_head = $this->feeSubHeadService->findFeeSubHeadById($id);

        if (!$fee_sub_head) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeSubHead can not be edit.'));
        }

        return view('backend.fee_sub_heads.edit', [
            'fee_sub_head' => $fee_sub_head
        ]);
    }

    public function update(AccountingFundCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $fee_sub_head = $this->feeSubHeadService->findFeeSubHeadById($id);

        if (!$fee_sub_head) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeSubHead can not be update.'));
        }

        $this->feeSubHeadService->updateFeeSubHead($request->validated(), $id);

        return redirect('fee-head')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $fee_sub_head = $this->feeSubHeadService->deleteFeeSubHeadById($id);

        if (!$fee_sub_head) {
            return redirect('fee-head')->with('error', _lang('Something went wrong. FeeSubHead can not be delete.'));
        }

        return redirect('fee-head')->with('success', _lang('Information has been deleted'));
    }
}
