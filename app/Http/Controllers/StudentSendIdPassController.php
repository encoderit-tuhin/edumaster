<?php

namespace App\Http\Controllers;

use Exception;
use App\SmsLog;
use App\StudentSession;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;

class StudentSendIdPassController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly StudentService $studentService,
    ) {
    }

    public function index(): View|Factory
    {
        $class_id = (int) request()->class_id;
        $section_id = (int) request()->section_id;
        $group_id = (int) request()->group_id;

        $students = $this->studentService->getStudentsByClassSectionGroup($class_id, $section_id, $group_id);

        return view('backend.students.send_id_pass.index', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_ids' => 'required'
        ]);

        foreach ($request->student_ids as $key => $student_id) {
            $user = $this->studentService->getStudentById($student_id);

            try {
                $mobile_number = $user->phone;
                $body = "Dear student, your login credentials are: User: $user->email, Password: $user->password_static. Please use these credentials to access your account. Log in at https://school.devmative.com/public/login";
                $response = (new SmsLog())->setPhoneNumbers([$mobile_number])->setMessage($body)->sendSms();

                if ($response) {
                    $log = new SmsLog();
                    $log->receiver = $mobile_number;
                    $log->message = $body;
                    $log->user_id = $user->id;
                    $log->user_type = 'Student';
                    $log->sender_id = Auth::user()->id;
                    $log->save();
                }
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->back()->with('success', _lang('Message Send Successfully.'));
    }

    public function edit($id): View|Factory
    {
        $student = $this->studentService->getStudentById($id);

        if (!$student) {
            return abort(404);
        }

        $studentSession = StudentSession::where('student_id', $id)->first();
        return view('backend.students.send_id_pass.edit', [
            'student' => $student,
            'studentSession' => $studentSession,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = $this->studentService->findStudentById($id);

        $this->userService->createOrUpdateUser($request->all(), intval($student->user_id));

        return back()->with('success', _lang('Student data has been updated.'));
    }

    public function delete($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $student = $this->studentService->findStudentById($id);

                if (!$student) {
                    return back()->with('error', _lang('Student not found.'));
                }

                $this->userService->deleteUserById($student->user_id);
                $this->studentService->deleteStudentById($id);

                return back()->with('success', _lang('Student data has been deleted.'));
            });
        } catch (\Exception $e) {
            return back()->with('error', _lang('An error occurred while deleting the student.'));
        }
    }
}
