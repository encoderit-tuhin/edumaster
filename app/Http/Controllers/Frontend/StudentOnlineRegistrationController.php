<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Section;
use App\Traits\Trackable;
use App\Enums\UserLogAction;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\StudentOnlineRegistrationService;
use App\Http\Requests\StudentOnlineRegistrationCreateRequest;
use App\Http\Requests\StudentOnlineRegistrationUpdateRequest;
use App\Student;
use App\Subject;

class StudentOnlineRegistrationController extends Controller
{
    use Trackable;

    public function __construct(private readonly StudentOnlineRegistrationService $studentOnlineRegistrationService)
    {
    }

    public function index(): View|Factory
    {
        $sections = Section::orderBy('id', 'DESC')->get();
        $boards = get_board_name();
        $elective_or_optional_subjects = collect([]);
        $displayStatus = get_option('admission_display_status');

        if($displayStatus == 'yes')
        {
            return view(theme() . '.student_online_registration.index', compact('sections', 'boards', 'elective_or_optional_subjects'));
        }else{
            abort(redirect('/'));
        }
        
    }

    public function store(StudentOnlineRegistrationCreateRequest $request): Redirector|RedirectResponse
    {
        try {
            $student = $this->studentOnlineRegistrationService->createStudentOnlineRegistration($request->all());

            if ($student) {
                $this->trackAction(UserLogAction::CREATE, Student::class, $student->id, 'Student created by applying student form.');
            }

            session()->flash('success', _lang('Your application has been granted successfully.'));
            return back();
        } catch (Exception $e) {
            session()->flash('error', _lang($e->getMessage()));
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentOnlineRegistrationUpdateRequest $request, $id)
    {
        try {
            $student = $this->studentOnlineRegistrationService->updateStudentOnlineRegistration(
                $request->all(),
                $id
            );

            if ($student) {
                $this->trackAction(UserLogAction::UPDATE, Student::class, $student->id, 'Online application updated.');
            }

            session()->flash('success', _lang('Update Successfully.'));
            return back();
        } catch (Exception $e) {
            session()->flash('error', _lang($e->getMessage()));
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getSubjects(Request $request)
    {
        if (empty($request->class_id) || empty($request->group_id)) {
            return '';
        }

        $student = null;
        try {
            if ($request->id) {
                $student = $this->studentOnlineRegistrationService->findStudentOnlineRegistrationById(
                    $request->id ?? 0
                );
            }
        } catch (\Throwable $th) {
            //
        }

        $class_id = $request->class_id || $student->class_id ?? null;
        $class_id = 1; // for now, both tweleve and eleven has same subjects
        $group_id = $request->group_id ?? $student->group_id ?? null;

        $compulsory_subjects = Subject::getCompulsorySubjects($class_id, $group_id);
        $elective_or_optional_subjects = Subject::getElectiveOrOptionalSubjects($class_id);

        return view(
            'partials.subject-chooser',
            compact('compulsory_subjects', 'elective_or_optional_subjects', 'student')
        );
    }
}
