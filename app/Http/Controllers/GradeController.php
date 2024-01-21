<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GradeService;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\GradeCreateRequest;

class GradeController extends Controller
{
    public function __construct(private readonly GradeService $gradeService)
    {
    }

    public function index(): View|Factory
    {
        $grades = $this->gradeService->getGrades();

        return view('backend.marks.grade.list', compact('grades'));
    }

    public function create(Request $request): View|Factory
    {
        if (!$request->ajax()) {
            return view('backend.marks.grade.create');
        } else {
            return view('backend.marks.grade.modal.create');
        }
    }

    public function store(GradeCreateRequest $request): Redirector|RedirectResponse
    {
        $grade = $this->gradeService->createGrade($request->validated());

        if (!$request->ajax()) {
            return redirect('grades/create')->with('success', _lang('Information has been added successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $grade]);
        }
    }

    public function show(Request $request, $id): View|Factory
    {
        $grade = $this->gradeService->findGradeById($id);

        if (!$request->ajax()) {
            return view('backend.marks.grade.view', compact('grade', 'id'));
        } else {
            return view('backend.marks.grade.modal.view', compact('grade', 'id'));
        }
    }

    public function edit(Request $request, $id): View|Factory
    {
        $grade = $this->gradeService->findGradeById($id);

        if (!$request->ajax()) {
            return view('backend.marks.grade.edit', compact('grade', 'id'));
        } else {
            return view('backend.marks.grade.modal.edit', compact('grade', 'id'));
        }
    }

    public function update(GradeCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $grade = $this->gradeService->updateGrade($request->validated(), intval($id));

        if (!$request->ajax()) {
            return redirect('grades/create')->with('success', _lang('Information has been updated successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been updated successfully'), 'data' => $grade]);
        }
    }

    public function destroy($id)
    {
        $this->gradeService->deleteGradeById($id);

        return redirect('grades')->with('success', _lang('Information has been deleted successfully'));
    }
}
