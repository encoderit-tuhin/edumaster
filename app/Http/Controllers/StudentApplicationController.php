<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\StudentOnlineRegistrationController;
use Illuminate\Http\Request;
use App\Services\StudentOnlineRegistrationService;
use App\Http\Requests\StudentOnlineRegistrationCreateRequest;
use App\Subject;

class StudentApplicationController extends Controller
{
    public function __construct(private readonly StudentOnlineRegistrationService $studentOnlineRegistrationService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index($class_id = "")
    {
        if ($class_id !== "") {
            $students = $this->studentOnlineRegistrationService->getStudentsByClass($class_id);
        } else {
            $students = $this->studentOnlineRegistrationService->getStudentOnlineRegistrations();
        }

        $class = $class_id;

        return view('backend.students.onlineRegistration.index', compact('students', 'class'));
    }

    public function create()
    {
        $boards = get_board_name();
        $elective_or_optional_subjects = collect([]);
        return view('backend.students.onlineRegistration.create', compact('boards', 'elective_or_optional_subjects'));
    }

    public function edit($id)
    {
        $student = $this->studentOnlineRegistrationService->findStudentOnlineRegistrationById($id);
        if (!$student) {
            session()->flash('error', _lang('Online Application Not Found'));
            return back();
        }

        $boards = get_board_name();

        $class_id = 1;
        $elective_or_optional_subjects = Subject::getElectiveOrOptionalSubjects($class_id);

        return view('backend.students.onlineRegistration.edit', compact('student', 'boards', 'elective_or_optional_subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $student = $this->studentOnlineRegistrationService->findStudentOnlineRegistrationById($id);
        // if (!$student) {
        //     session()->flash('error', _lang('Online Application Not Found'));
        //     return back();
        // }

        // $this->studentOnlineRegistrationService->updateStudentOnlineRegistration($request->all(), $id);

        // session()->flash('success', _lang('Information Updated'));
        // return redirect()->route('admin.student-application.index');

        // This should be called in StudentOnlineRegistrationController.php
    }
}
