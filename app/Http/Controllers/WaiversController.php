<?php

namespace App\Http\Controllers;

use App\Services\WaiverService;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\WaiverCreateRequest;

class WaiversController extends Controller
{
    public function __construct(private readonly WaiverService $waiverService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.waivers.index', [
            'waivers' => $this->waiverService->getWaivers(),
        ]);
    }

    public function store(WaiverCreateRequest $request): Redirector|RedirectResponse
    {
        $waiver = $this->waiverService->createWaiver($request->validated());

        if (!$waiver) {
            return redirect('waivers')->with('error', _lang('Something went wrong. Waiver can not be submitted.'));
        }

        return redirect('waivers')->with('success', _lang('Waiver application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $waiver = $this->waiverService->findWaiverById($id);

        if (!$waiver) {
            return redirect('waivers')->with('error', _lang('Something went wrong. Waiver can not be edit.'));
        }

        return view('backend.waivers.edit', [
            'waiver' => $waiver
        ]);
    }

    public function update(WaiverCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $waiver = $this->waiverService->findWaiverById($id);

        if (!$waiver) {
            return redirect('waivers')->with('error', _lang('Something went wrong. Waiver can not be update.'));
        }

        $this->waiverService->updateWaiver($request->validated(), $id);

        return redirect('waivers')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $waiver = $this->waiverService->deleteWaiverById($id);

        if (!$waiver) {
            return redirect('waivers')->with('error', _lang('Something went wrong. Waiver can not be delete.'));
        }

        return redirect('waivers')->with('success', _lang('Information has been deleted'));
    }
}
