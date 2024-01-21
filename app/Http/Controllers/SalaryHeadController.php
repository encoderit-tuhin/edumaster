<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use App\Services\SalaryHeadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Requests\SalaryHeadCreateRequest;

class SalaryHeadController extends Controller
{
    public function __construct(
        private readonly SalaryHeadService $salaryHead
    ) {
    }

    public function index(): Renderable
    {
        return view('backend.salary_head.index', [
            'salaryHeads' => $this->salaryHead->getSalaryHeads()
        ]);
    }

    public function store(SalaryHeadCreateRequest $request): RedirectResponse|Redirector
    {
        $salaryHead = $this->salaryHead->createSalaryHead($request->validated());

        if (!$salaryHead) {
            return redirect('salary-heads')->with('error', _lang('Something went wrong. Salary head can not be submitted.'));
        }

        return redirect('salary-heads')->with('success', _lang('Salary head application has been submitted.'));
    }

    public function edit($id): Renderable
    {
        $salaryHead = $this->salaryHead->findSalaryHeadById($id);
        if (!$salaryHead) {
            abort(404);
        }

        return view('backend.salary_head.edit', [
            'salaryHead' => $salaryHead
        ]);
    }

    public function update(SalaryHeadCreateRequest $request, $id): RedirectResponse|Redirector
    {
        $salaryHead = $this->salaryHead->findSalaryHeadById($id);

        if (!$salaryHead) {
            abort(404);
        }

        $this->salaryHead->updateSalaryHead($request->validated(), $id);

        return redirect('salary-heads')->with('success', _lang('Information has been added'));;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse|Redirector
    {
        $salaryHead = $this->salaryHead->findSalaryHeadById($id);

        if (!$salaryHead) {
            abort(404);
        }

        $this->salaryHead->deleteSalaryHeadById($id);

        return redirect('salary-heads')->with('success', _lang('Information has been deleted'));
    }
}
