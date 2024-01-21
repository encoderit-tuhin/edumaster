<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\StudentCategoriesService;
use App\Http\Requests\StudentCategoryCreateRequest;

class StudentCategoriesController extends Controller
{
    public function __construct(private readonly StudentCategoriesService $studentCategoryService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.student_categories.index', [
            'student_categories' => $this->studentCategoryService->getStudentCategories(),
        ]);
    }

    public function store(StudentCategoryCreateRequest $request): Redirector|RedirectResponse
    {
        $studentCategory = $this->studentCategoryService->createStudentCategory($request->validated());

        if (!$studentCategory) {
            return redirect('student-categories')->with('error', _lang('Something went wrong. StudentCategory can not be submitted.'));
        }

        return redirect('student-categories')->with('success', _lang('StudentCategory application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $studentCategory = $this->studentCategoryService->findStudentCategoryById($id);

        if (!$studentCategory) {
            return redirect('student-categories')->with('error', _lang('Something went wrong. StudentCategory can not be edit.'));
        }

        return view('backend.student_categories.edit', [
            'studentCategory' => $studentCategory
        ]);
    }

    public function update(StudentCategoryCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $studentCategory = $this->studentCategoryService->findStudentCategoryById($id);

        if (!$studentCategory) {
            return redirect('student-categories')->with('error', _lang('Something went wrong. StudentCategory can not be update.'));
        }

        $this->studentCategoryService->updateStudentCategory($request->validated(), $id);

        return redirect('student-categories')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $studentCategory = $this->studentCategoryService->deleteStudentCategoryById($id);

        if (!$studentCategory) {
            return redirect('student-categories')->with('error', _lang('Something went wrong. StudentCategory can not be delete.'));
        }

        return redirect('student-categories')->with('success', _lang('Information has been deleted'));
    }
}
