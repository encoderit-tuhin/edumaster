<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\MarkDistributionService;
use App\Http\Requests\MarkDistributionCreateRequest;

class MarkDistributionController extends Controller
{
    public function __construct(private readonly MarkDistributionService $markDistributionService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.marks.mark_distribution.list', [
            'markDistributions' => $this->markDistributionService->getMarkDistributions()
        ]);
    }

    public function create(Request $request): View|Factory
    {
        if (!$request->ajax()) {
            return view('backend.marks.mark_distribution.create');
        } else {
            return view('backend.marks.mark_distribution.modal.create');
        }
    }

    public function store(MarkDistributionCreateRequest $request): Redirector|RedirectResponse
    {
        $markDistributions = $this->markDistributionService->createMarkDistribution($request->validated());

        if (!$request->ajax()) {
            return redirect('mark_distributions/create')->with('success', _lang('Information has been added successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $markDistributions]);
        }
    }

    public function show(Request $request, $id): View|Factory
    {
        $markDistribution = $this->markDistributionService->findMarkDistributionById($id);
        if (!$request->ajax()) {
            return view('backend.marks.mark_distribution.view', compact('markDistribution', 'id'));
        } else {
            return view('backend.marks.mark_distribution.modal.view', compact('markDistribution', 'id'));
        }
    }

    public function edit(Request $request, $id): View|Factory
    {
        $markDistribution = $this->markDistributionService->findMarkDistributionById($id);
        if (!$request->ajax()) {
            return view('backend.marks.mark_distribution.edit', compact('markDistribution', 'id'));
        } else {
            return view('backend.marks.mark_distribution.modal.edit', compact('markDistribution', 'id'));
        }
    }

    public function update(MarkDistributionCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $markDistribution = $this->markDistributionService->updateMarkDistribution($request->validated(), intval($id));

        if (!$request->ajax()) {
            return redirect('mark_distributions')->with('success', _lang('Information has been updated successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Information has been updated successfully'), 'data' => $markDistribution]);
        }
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        try {
            $this->markDistributionService->deleteMarkDistributionById($id);

            return redirect('mark_distributions')->with('success', _lang('Information has been deleted successfully'));
        } catch (\Exception $e) {
            return redirect('mark_distributions')->with('error', _lang('Failed to delete information'));
        }
    }
}
