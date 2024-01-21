<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Services\AcademicYearService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\AcademicYearCreateRequest;

class AcademicYearsController extends Controller
{
    public function __construct(private readonly AcademicYearService $academicYearService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.administration.academic_year.index', [
            'academicYears' => $this->academicYearService->getAcademicYears(),
        ]);
    }

    public function create(Request $request): View|Factory
    {
        if (!$request->ajax()) {
            return view('backend.administration.academic_year.create');
        } else {
            return view('backend.administration.academic_year.modal.create');
        }
    }

    public function store(AcademicYearCreateRequest $request)
    {
        $academicYear = $this->academicYearService->createAcademicYear($request->validated());

        if (!$academicYear) {
            if (!$request->ajax()) {
                return redirect('academic-years')->with('error', _lang('Something went wrong. Academic year cannot be submitted.'));
            } else {
                return response()->json(['result' => 'error', 'action' => 'store', 'message' => _lang('Something went wrong. Academic year cannot be submitted')]);
            }
        }

        if (!$request->ajax()) {
            return redirect('academic-years')->with('success', _lang('Information has been added successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added successfully'), 'data' => $academicYear]);
        }
    }

    public function show(Request $request, $id): View|Factory
    {
        $academicYear = $this->academicYearService->findAcademicYearById($id);
        if (!$request->ajax()) {
            return view('backend.administration.academic_year.view', compact('academicYear', 'id'));
        } else {
            return view('backend.administration.academic_year.modal.view', compact('academicYear', 'id'));
        }
    }

    public function edit(Request $request, $id)
    {
        $academicYear = $this->academicYearService->findAcademicYearById($id);

        if (!$academicYear) {
            return redirect('academic-years')->with('error', _lang('Something went wrong. Academic year can not be edit.'));
        }

        if (!$request->ajax()) {
            return view('backend.administration.academic_year.edit', compact('academicYear', 'id'));
        } else {
            return view('backend.administration.academic_year.modal.edit', compact('academicYear', 'id'));
        }
    }

    public function update(AcademicYearCreateRequest $request, $id)
    {
        $academicYear = $this->academicYearService->updateAcademicYear($request->validated(), $id);

        if (!$academicYear) {
            if (!$request->ajax()) {
                return redirect('academic-years')->with('error', _lang('Something went wrong. Academic year cannot be submitted.'));
            } else {
                return response()->json(['result' => 'error', 'action' => 'update', 'message' => _lang('Something went wrong. Academic year cannot be submitted')]);
            }
        }

        if (!$request->ajax()) {
            return redirect('academic-years')->with('success', _lang('Information has been update successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Information has been update successfully'), 'data' => $academicYear]);
        }
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $current_session = get_option("academic_year");

        if ($id == $current_session) {
            return redirect('academic-years')->with('error', _lang('Sorry, You cannot delete current Academic Session !'));
        }

        $academicYear = $this->academicYearService->deleteAcademicYearById($id);

        if (!$academicYear) {
            return redirect('academic-years')->with('error', _lang('Something went wrong. Academic year can not be delete.'));
        }

        return redirect('academic-years')->with('success', _lang('Information has been deleted'));
    }
}
