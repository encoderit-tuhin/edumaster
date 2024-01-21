<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use App\Services\DepartmentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\DepartmentCreateRequest;

class DepartmentsController extends Controller
{
    public function __construct(private readonly DepartmentService $departmentService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.departments.index', [
            'departments' => $this->departmentService->getDepartments(),
        ]);
    }

    public function store(DepartmentCreateRequest $request): Redirector|RedirectResponse
    {
        $department = $this->departmentService->createDepartment($request->validated());

        if (!$department) {
            return redirect('departments')->with('error', _lang('Something went wrong. Department can not be submitted.'));
        }

        return redirect('departments')->with('success', _lang('Department application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $department = $this->departmentService->findDepartmentById($id);

        if (!$department) {
            return redirect('departments')->with('error', _lang('Something went wrong. Department can not be edit.'));
        }

        return view('backend.departments.edit', [
            'department' => $department
        ]);
    }

    public function update(DepartmentCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $department = $this->departmentService->findDepartmentById($id);

        if (!$department) {
            return redirect('departments')->with('error', _lang('Something went wrong. Department can not be update.'));
        }

        $this->departmentService->updateDepartment($request->validated(), $id);

        return redirect('departments')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $department = $this->departmentService->deleteDepartmentById($id);

        if (!$department) {
            return redirect('departments')->with('error', _lang('Something went wrong. Department can not be delete.'));
        }

        return redirect('departments')->with('success', _lang('Information has been deleted'));
    }
}
