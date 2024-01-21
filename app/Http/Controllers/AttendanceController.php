<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Validator;
use App\Period;
use App\SmsLog;
use App\Section;
use App\Student;
use Carbon\Carbon;
use App\ClassModel;
use App\StaffAttendance;
use App\StudentAttendance;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\PeriodService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\SectionRepository;
use App\Imports\StudentsAttendanceImport;
use App\StudentAttendance as SAttendance;

class AttendanceController extends Controller
{
	public function __construct(
		private readonly SectionRepository $sectionRepo,
		private readonly PeriodService $periodService,
		private readonly StudentService $studentService,
		private readonly UserService $userService,
	) {
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function student_attendance(Request $request)
	{
		$attendance = [];
		$periods = $this->periodService->getPeriods();
		$class_id = (int) $request->class_id;
		$section_id = (int) $request->section_id;
		$date = $request->date;
		$period_id = (int) $request->period_id;

		if ($class_id == "" || $section_id == "" || $date == "" || $period_id == "") {
			return view('backend.attendance.student-attendance', compact('attendance', 'date', 'class_id', 'section_id', 'periods', 'period_id'));
		} else {
			$class = ClassModel::find($class_id)->class_name;
			$section = Section::find($section_id)->section_name;
			$periodName = Period::find($period_id)->period;

			$attendance = Student::select('*', 'student_attendances.id AS attendance_id')
				->leftJoin('student_attendances', function ($join) use ($date, $period_id) {
					$join->on('student_attendances.student_id', '=', 'students.id');
					$join->where('student_attendances.date', '=', $date);
					$join->where('student_attendances.period_id', '=', $period_id);
				})
				->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
				->where('student_sessions.session_id', get_option('academic_year'))
				->where('student_sessions.class_id', $class_id)
				->where('student_sessions.section_id', $section_id)
				->orderBy('student_sessions.roll', 'ASC')
				->get();

			return view('backend.attendance.student-attendance', compact('attendance', 'date', 'class', 'section', 'periodName', 'class_id', 'section_id', 'periods', 'period_id'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function student_attendance_save(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'attendance' => 'required',
		]);

		if ($validator->fails()) {
			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			} else {
				return redirect('student/attendance')
					->withErrors($validator)
					->withInput();
			}
		}

		for ($i = 0; $i < count($request->student_id); $i++) {
			$temp = array();
			$temp['student_id'] = (int)$request->student_id[$i];
			$temp['class_id'] = (int)$request->class_id[$i];
			$temp['section_id'] = (int)$request->section_id[$i];
			$temp['period_id'] = (int)$request->period_id[$i];
			$temp['date'] = $request->date;

			$studentAtt = SAttendance::firstOrNew($temp);
			$studentAtt->student_id = $temp['student_id'];
			$studentAtt->class_id = $temp['class_id'];
			$studentAtt->section_id = $temp['section_id'];
			$studentAtt->period_id = $temp['period_id'];
			$studentAtt->date = $temp['date'];
			$studentAtt->attendance = isset($request->attendance[$i]) ? $request->attendance[$i][0] : 2;
			$studentAtt->save();

			// Check if attendance is equal to 2 & also sms status 1
			if ($request->sms_status == 1) {
				if ($studentAtt->attendance == 2) {
					// Send SMS logic
					$student = $this->studentService->getStudentById((int) $studentAtt->student_id);
					try {
						$mobile_number = "01840416216";
						$body = "Dear Parent, 

This is to inform you that your child is marked as absent today at school. Please ensure the reason for the absence and take any necessary actions. If there is any concern, feel free to contact the school administration.

Thank you,
NDCM";
						$response = (new SmsLog())->setPhoneNumbers([$mobile_number])->setMessage($body)->sendSms();

						if ($response) {
							$log = new SmsLog();
							$log->receiver = $mobile_number;
							$log->message = $body;
							$log->user_id = $student->id;
							$log->user_type = 'Student';
							$log->sender_id = Auth::user()->id;
							$log->save();
						}
					} catch (Exception $e) {
						return redirect()->back()->with('error', $e->getMessage());
					}
				}
			}
		}

		if (!$request->ajax()) {
			return redirect('/student/attendance')->with('success', _lang('Saved Successfully'));
		} else {
			return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Saved Successfully')]);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function staff_attendance(Request $request)
	{
		$attendance = [];
		$date = $request->date;
		$user_type = $request->user_type;
		if ($date == "") {
			return view('backend.attendance.staff-attendance', compact('attendance', 'date', 'user_type'));
		} else {
			$attendance = User::select('*', 'users.id as user_id', 'staff_attendances.id as attendance_id')
				->leftJoin('staff_attendances', function ($join) use ($date) {
					$join->on('users.id', '=', 'staff_attendances.user_id');
					$join->where('staff_attendances.date', '=', $date);
				})
				->where('user_type', $user_type)
				->orderBy('users.id', 'DESC')
				->get();
			return view('backend.attendance.staff-attendance', compact('attendance', 'date', 'user_type'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function staff_attendance_save(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'attendance' => 'required',
		]);

		if ($validator->fails()) {
			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			} else {
				return redirect('staff/attendance')
					->withErrors($validator)
					->withInput();
			}
		}

		for ($i = 0; $i < count($request->user_id); $i++) {

			$temp = array();
			$temp['user_id'] = $request->user_id[$i];
			$temp['date'] = $request->date;
			$temp['start_time'] = $request->start_time[$i];
			$temp['end_time'] = $request->end_time[$i];

			$staffAtt = StaffAttendance::firstOrNew($temp);
			$staffAtt->user_id = $temp['user_id'];
			$staffAtt->date = $temp['date'];
			$staffAtt->start_time = $temp['start_time'];
			$staffAtt->end_time = $temp['end_time'];
			$staffAtt->attendance = isset($request->attendance[$i]) ? $request->attendance[$i][0] : 2;
			$staffAtt->save();

			// Check if attendance is equal to 2
			if ($request->sms_status == 1) {
				if ($staffAtt->attendance == 2) {
					// Send SMS logic
					$teacher = $this->userService->findUserById((int) $staffAtt->user_id);
					try {
						$mobile_number = "01840416216";
						// Body of the SMS to the principal
						$body = "Dear Sir, 

Teacher marked as absent today:
Name: {$teacher->name}
ID: {$teacher->id}

Please take necessary actions.

Thank you,
NDCM";

						$response = (new SmsLog())->setPhoneNumbers([$mobile_number])->setMessage($body)->sendSms();

						if ($response) {
							$log = new SmsLog();
							$log->receiver = $mobile_number;
							$log->message = $body;
							$log->user_id = $teacher->id;
							$log->user_type = 'Student';
							$log->sender_id = Auth::user()->id;
							$log->save();
						}
					} catch (Exception $e) {
						return redirect()->back()->with('error', $e->getMessage());
					}
				}
			}
		}

		if (!$request->ajax()) {
			return redirect('/staff/attendance')->with('success', _lang('Saved Successfully'));
		} else {
			return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Saved Successfully')]);
		}
	}

	public function show()
	{
		$sections = $this->sectionRepo->getSections();

		return view('backend.attendance.student-attendance-bulk-upload', compact('sections'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'xlsx_file' => 'required|mimes:xlsx,csv',
			'class' => 'required',
			'section' => 'required',
			'group' => 'required',
		]);

		$timeConfig = Section::where('id', $request->section)->with('shift')->first();

		if ($timeConfig->shift) {
			$file = $request->file('xlsx_file');
			$import = new StudentsAttendanceImport();
			Excel::import($import, $file);
			$importedData = $import->data;

			DB::beginTransaction();
			try {
				$startTime = $timeConfig->shift->start_time;
				$endTime = $timeConfig->shift->end_time;
				$attendanceNumber = 2;

				foreach ($importedData as $row) {
					if ($row['entry_time'] <= $startTime && $row['exit_time'] >= $endTime) {
						$attendanceNumber = 1;
					} elseif ($row['exit_time'] <= $endTime) {
						$attendanceNumber = 5;
					} else {
						$attendanceNumber = 3;
					}

					$studentId = (int)$row['student_id'];
					$existStudent = Student::where('id', $studentId)->first();

					if ($existStudent) {
						$studentAtt = new SAttendance();
						$studentAtt->student_id = $existStudent->id;
						$studentAtt->class_id = $request->class;
						$studentAtt->section_id = $request->section;
						$studentAtt->date = $request->date;
						$studentAtt->attendance = $attendanceNumber;
						$studentAtt->save();
					}
				}
				DB::commit();
				return redirect('reports/student_attendance_report')->with('success', _lang('Student Bulk Attendance upload successfully'));
			} catch (\Exception $e) {
				DB::rollback();
				return back()->with('error', _lang('Failed to insert records unsuccessfully'));
			}
		}

		return response()->json(['message' => 'This Section has no shift'], 404);
	}

	public function downloadDemoFile()
	{
		$filePath = public_path('uploads/student_xlsx_file/student_bulk_attendance.xlsx');

		if (file_exists($filePath)) {
			return response()->download($filePath, 'student_bulk_attendance.xlsx', [
				'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			]);
		}

		abort(404, 'File not found');
	}

	public function studentAttendanceDelete(Request $request)
	{
		$periods = $this->periodService->getPeriods();
		$class_id = (int) $request->input('class_id');
		$section_id = (int) $request->input('section_id');
		$date = $request->input('date');
		$period_id = (int) $request->input('period_id');

		if ($request->isMethod('post')) {
			$result = $this->deleteAttendanceData($class_id, $section_id, $date, $period_id);

			if ($result === true) {
				return redirect('/student_attendance/delete')
					->with('success', 'Attendance data deleted successfully.');
			} elseif ($result === false) {
				return redirect('/student_attendance/delete')
					->with('error', 'Attendance data not found.');
			} else {
				return redirect('/student_attendance/delete')
					->with('error', 'An unexpected error occurred.');
			}
		}
		return view('backend.attendance.student_attendance_delete', compact('class_id', 'section_id', 'date', 'period_id', 'periods'));
	}

	private function deleteAttendanceData($class_id, $section_id, $date, $period_id)
	{
		try {
			DB::beginTransaction();
			$deletedRows = StudentAttendance::where('class_id', $class_id)
				->where('section_id', $section_id)
				->where('date', $date)
				->where('period_id', $period_id)
				->delete();

			$success = $deletedRows > 0;
			DB::commit();
			return $success;
		} catch (\Exception $e) {
			DB::rollBack();
			return false;
		}
	}
}
