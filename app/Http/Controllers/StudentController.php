<?php

namespace App\Http\Controllers;

use Exception;
use App\Section;
use App\Student;
use App\Subject;
use App\StudentSession;
use App\Rules\UniqueRoll;
use App\Traits\Trackable;
use App\Enums\UserLogAction;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ClassService;
use Illuminate\Validation\Rule;
use App\Services\SectionService;
use App\Services\StudentService;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Services\StudentSessionService;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Services\StudentOnlineRegistrationService;

class StudentController extends Controller
{
    use Trackable;

    public function __construct(
        private readonly UserService $userService,
        private readonly ClassService $classService,
        private readonly SectionService $sectionService,
        private readonly StudentService $studentService,
        private readonly StudentSessionService $studentSessionService,
        private readonly StudentOnlineRegistrationService $studentOnlineRegistrationService
    ) {
    }

    public function index(): View|Factory
    {
        $class_id = (int)request()->class_id;
        $section_id = (int)request()->section_id;
        $group_id = (int)request()->group_id;

        $students = $this->studentService->getStudentsByClassSectionGroup($class_id, $section_id, $group_id);

        return view('backend.students.student-list', [
            'students' => $students
        ]);
    }

    public function create($id = null): View|Factory|\Illuminate\Http\RedirectResponse
    {
        // Only for NDCM.
        // Redirect to online application form if already a student exist for this online form.

        // Check if already a student exist for this online form.
        $student = null;
        if ($id) {
            $student = $this->studentOnlineRegistrationService->findStudentOnlineRegistrationById($id);
            if ($student) {
                return redirect()->route('student-applications.edit', $id);
            }

            // if ($student->student_id) {
            //     return redirect()->route('student-applications.index')->with(
            //         'error',
            //         _lang('Student already exist for this online form.')
            //     );
            // }
        }

        // Only for NDCM.
        return redirect()->route('student-applications.create');

        return view('backend.students.student-add', [
            'sections' => $this->sectionService->getSections(),
            'id' => $id,
            'studentData' => $id ? $student : null,
            'is_online' => $id ? 1 : 0,
        ]);
    }

    public function store(StudentCreateRequest $request): Redirector|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = $this->userService->createOrUpdateUser($request->all());

            $student = $this->studentService->createStudent($request->validated(), $user->id);
            if ($request->is_online == 1) {
                $this->studentOnlineRegistrationService->storeStudentAllInformation(
                    $request->validated(),
                    $request->online_form_id,
                    $student->id
                );

                $this->studentOnlineRegistrationService->updateStudentOnlineRegistratioStudentId(
                    $user,
                    $student,
                    $request->online_form_id
                );
            }

            $data = [
                'session_id' => intval(get_option('academic_year')),
                'student_id' => intval($student->id),
                'class_id' => intval($request->class),
                'section_id' => intval($request->section),
                'roll' => intval($request->roll),
                'optional_subject' => intval($request->optional_subject),
            ];

            $this->studentSessionService->createStudentSession($data);

            $createModel = $student->id;
            $model_id = $createModel->id;
            $this->trackAction(UserLogAction::CREATE, Student::class, $model_id, 'create');
            DB::commit();
            return redirect()->route('students.index')->with('success', _lang('Information has been added'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', _lang($e->getMessage()));
        }
    }

    public function show($id): View|Factory
    {
        $studentSession = $this->studentSessionService->findStudentSessionById((int)$id);

        return view('backend.students.student-view', compact('studentSession'));
    }

    public function edit($id): View|Factory|\Illuminate\Http\RedirectResponse
    {
        // For NDCM, redirect to online application form.
        $onlineApplication = $this->studentOnlineRegistrationService->findStudentOnlineRegistrationByStudentId($id);
        if ($onlineApplication) {
            return redirect()->route('student-applications.edit', $id);
        } else {
            session()->flash('error', _lang('Online Application Not Found. Please create online application first.'));
            return back();
        }

        $classes = $this->classService->getClasses();
        $sections = $this->sectionService->getSections();
        $data = $this->studentSessionService->findStudentSessionById($id);
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->join('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('previous_institutes', 'previous_institutes.student_id', '=', 'students.id')
            ->leftJoin('previous_exams', 'previous_exams.student_id', '=', 'students.id')
            ->leftJoin('parents', 'parents.id', '=', 'students.parent_id')
            ->leftJoin('student_addition_information', 'student_addition_information.student_id', '=', 'students.id')

            ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('students.id', $id)
            ->with('studentGroup', 'studentSession')
            ->select('*', 'students.id as studentId')
            ->first();

        return view('backend.students.student-edit', [
            'classes' => $classes,
            'sections' => $sections,
            'data' => $data,
            'student' => $student,
        ]);
    }

    public function update(StudentUpdateRequest $request, $id): Redirector|RedirectResponse
    {
        $student = $this->studentService->findStudentById($id);

        $this->validate($request, [
            'register_no' => [
                'required',
                Rule::unique('students')->ignore($id),
            ],
            'roll' => ['required', new UniqueRoll($request->section, $request->roll, $student->id)],
            'email' => [
                'required',
                Rule::unique('users')->ignore($student->user_id),
            ],
        ]);

        $this->studentService->updateStudent($request->validated(), $id);

        $data = [
            'session_id' => intval(get_option('academic_year')),
            'student_id' => intval($id),
            'class_id' => intval($request->class),
            'section_id' => intval($request->section),
            'roll' => intval($request->roll),
            'optional_subject' => intval($request->optional_subject),
        ];

        $this->studentSessionService->updateStudentSession($data, $request->session_id);

        $this->userService->createOrUpdateUser($request->all(), intval($student->user_id));

        return redirect($_SERVER['HTTP_REFERER'])->with('success', _lang('Information has been updated'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {
                $student = $this->studentService->findStudentById(intval($id));
                $this->studentSessionService->deleteStudentSessionById($student->studentSession->id);
                $this->userService->deleteUserById(intval($student->user_id));
                $this->studentService->deleteStudentById(intval($student->id));
            });

            return back()->with('success', _lang('Student data has been deleted.'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', _lang('An error occurred while deleting the information'));
        }
    }

    public function fetchStudentData(Request $request)
    {
        $phone = $request->input('phone');
        $student = $this->studentOnlineRegistrationService->getStudentDataByPhone($phone);

        if ($student) {
            return response()->json($student);
        } else {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    public function get_subjects($class_id = "")
    {
        if ($class_id != "") {
            $subjects = Subject::where('class_id', $class_id)->get();
            $options = '';
            $options .= '<option value="">' . _lang('Select One') . '</option>';
            foreach ($subjects as $subject) {
                $options .= '<option value="' . $subject->id . '">' . $subject->subject_name . '</option>';
            }
            return $options;
        }
    }

    public function get_students($class_id = "", $section_id = ""): string|false
    {
        if ($class_id != "" && $section_id != "") {
            $students = Student::join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->select('students.*', 'student_sessions.roll')
                ->where('student_sessions.session_id', get_option('academic_year'))
                ->where('student_sessions.class_id', $class_id)
                ->where('student_sessions.section_id', $section_id)->get();

            return json_encode($students);
        }
    }
    public function get_students_by_classId($id)
    {

        if ($id != "") {
            $students = Student::join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftjoin('parents', 'students.parent_id', '=', 'parents.id')
                ->select('students.*', 'parents.parent_name', 'parents.phone as parent_phone', 'student_sessions.roll')
                ->where('student_sessions.session_id', get_option('academic_year'))
                ->where('student_sessions.class_id', $id)
                ->get();
            return view('backend.sms.student-filter-data', compact('students'));
        }
    }
    public function get_students_by_classId_section_id($class_id, $section_id)
    {
        if ($class_id != "") {
            $students = $this->studentByClassIdAndSectionID($class_id, $section_id);
            return view('backend.sms.student-filter-data', compact('students'));
        }
    }

    public function id_card($id): View|Factory
    {
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->join('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('students.id', $id)->first();

        return view('backend.students.modal.id_card', compact('student'));
    }

    public function promote(Request $request, $step = 1): View|Factory|Redirector|RedirectResponse
    {
        $class_id = "";
        if ($step == 1) {
            return view('backend.marks.promote_student.step_one', compact('class_id'));
        } else if ($step == 2) {
            $class_id = $request->class_id;
            return view('backend.marks.promote_student.step_two', compact('class_id'));
        } else if ($step == 3) {
            @ini_set('max_execution_time', 0);
            @set_time_limit(0);

            $failed_students = "";
            $subjects = "";

            $class_id = $request->class_id;
            $promoted_class_id = $request->promote_class_id;
            $promoted_session = $request->promoted_session;

            $session = get_option('academic_year');

            foreach ($request->subject as $key => $val) {
                $subjects .= $key . ",";
            }
            $subjects = substr_replace($subjects, "", -1);


            $subjects = DB::select("SELECT marks.student_id,marks.subject_id,SUM(mark_details.mark_value) as total_marks,(SUM(mark_details.mark_value)/(SELECT COUNT(id)
			FROM marks as m WHERE subject_id=marks.subject_id AND student_id=marks.student_id)) avg_mark, subjects.pass_mark from mark_details,marks,student_sessions,subjects
			WHERE mark_details.mark_id=marks.id AND marks.student_id=student_sessions.student_id AND student_sessions.session_id=:session AND marks.subject_id=subjects.id
			AND marks.class_id=:class_id AND subjects.id IN($subjects)
			GROUP by marks.subject_id,marks.student_id", ["session" => $session, "class_id" => $class_id]);

            foreach ($subjects as $subject) {
                if ($subject->avg_mark < $subject->pass_mark) {
                    $failed_students .= $subject->student_id . ",";
                }
            }
            $failed_students = substr_replace($failed_students, "", -1);
            $query = "";
            if ($failed_students != "") {
                $query = " AND students.id NOT IN($failed_students) ";
            }

            $promotion = DB::select("SELECT marks.student_id,student_sessions.roll, IFNULL(SUM(mark_details.mark_value),0) as total_marks
			FROM marks,mark_details,exams,students,student_sessions WHERE marks.id=mark_details.mark_id AND marks.exam_id=exams.id AND
			marks.student_id=students.id AND students.id=student_sessions.student_id AND marks.class_id=:class_id AND student_sessions.session_id=:session
			$query GROUP BY marks.student_id ORDER BY total_marks DESC", ["class_id" => $class_id, "session" => $session]);

            $sections = Section::where("class_id", $promoted_class_id)->orderBy('rank', 'asc')->get();
            $sections_count = count($sections);
            $student_count = count($promotion);

            if ($sections_count > 0 && $student_count > 0) {
                //$split = ceil($student_count/$sections_count);
                $section = 0;
                $counter = 1;
                $roll = 1;

                $split = $sections[$section]->capacity;

                foreach ($promotion as $p) {
                    //Create Student Session Information
                    $studentSession = new StudentSession();
                    $studentSession->session_id = $promoted_session;
                    $studentSession->student_id = $p->student_id;
                    $studentSession->class_id = $promoted_class_id;
                    $studentSession->section_id = $sections[$section]->id;
                    $studentSession->roll = $roll;
                    try {
                        $studentSession->save();
                    } catch (\Illuminate\Database\QueryException $e) {
                        return redirect('students/promote')->with('error', _lang('Sorry, You have already promoted this class!'));
                    } catch (\Exception $e) {
                        return redirect('students/promote')->with('error', _lang('Sorry, You have already promoted this class!'));
                    }


                    $counter++;
                    $roll++;

                    if ($counter > $split) {
                        $counter = 1;
                        $section++;
                    }
                }
                return redirect('students/promote')->with('success', _lang('Student Promoted Successfully.'));
            } else {
                return redirect('students/promote')->with('error', _lang('Sorry, Section not available for promoted class ! Please create Section first.'));
            }
        }
    }

    function studentByClassIdAndSectionID($class_id, $section_id)
    {
        return Student::join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftjoin('parents', 'students.parent_id', '=', 'parents.id')
            ->select('students.*', 'parents.parent_name', 'parents.phone as parent_phone', 'student_sessions.roll')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('student_sessions.class_id', $class_id)
            ->where('student_sessions.section_id', $section_id)
            ->with('studentSession', 'studentGroup')
            ->get();
    }

    function studentIdCard()
    {
        return view('backend.students.id-card.index');
    }

    function studentIdCardList(Request $request)
    {
        $class_id = (int)request()->class_id;
        $section_id = (int)request()->section_id;
        $group_id = (int)request()->group_id;
        $validity_date = request()->validity;

        $students = $this->studentService->getStudentsByClassSectionGroup($class_id, $section_id, $group_id);
        return view('backend.students.id-card.card-list', compact('students', 'validity_date'));
    }

    public function statusEnable($id)
    {
        $student = $this->studentService->findStudentById($id);
        if ($student) {
            $student->status = '1';
            $student->save();

            $user = $this->userService->findUserById($student->user_id);
            $user->user_status = '1';
            $user->save();

            return back()->with('success', _lang('Student Enable Successfully.'));
        }
    }

    public function statusDisable($id)
    {
        $student = $this->studentService->findStudentById((int) $id);
        if ($student) {
            $student->status = '0';
            $student->save();

            $user = $this->userService->findUserById($student->user_id);
            $user->user_status = '0';
            $user->save();

            return back()->with('error', _lang('Student Disable Successfully.'));
        }
    }
}
