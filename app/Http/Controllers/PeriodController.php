<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;
use App\Services\PeriodService;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;

class PeriodController extends Controller
{
    public function __construct(
        private readonly PeriodService $periodService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.period.list', [
            'periods' => $this->periodService->getPeriods(),
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
            return view('backend.period.create');
        } else {
            return view('backend.period.modal.create');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'period' => 'required|max:50',
            'serial_no' => 'nullable|numeric',
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

        $period = new Period();
        $period->serial_no = $request->input('serial_no');
        $period->period = $request->input('period');
        $period->save();

        if (!$request->ajax()) {
            return redirect('bank-accounts/create')->with('success', _lang('Information has been added successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $period]);
        }
    }

    public function edit($id): View|Factory
    {
        $period = $this->periodService->findPeriodById($id);

        if (!$period) {
            return redirect('periods')->with('error', _lang('Something went wrong. Period can not be edit.'));
        }

        return view('backend.period.edit', [
            'period' => $period
        ]);
    }

    public function update(Request $request, $id): Redirector|RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'period' => 'required|max:50',
            'serial_no' => 'nullable|numeric',
        ]);

        $period = $this->periodService->findPeriodById($id);

        if (!$period) {
            return redirect('periods')->with('error', _lang('Something went wrong. Period can not be update.'));
        }

        $this->periodService->updatePeriod($request->all(), $id);

        return redirect('periods')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $fee_head = $this->periodService->deletePeriodById($id);

        if (!$fee_head) {
            return redirect('periods')->with('error', _lang('Something went wrong. Period can not be delete.'));
        }

        return redirect('periods')->with('success', _lang('Information has been deleted'));
    }
}
