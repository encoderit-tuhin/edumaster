<?php

namespace App\Http\Controllers;

use App\Exam;
use Validator;
use App\Student;
use App\Subject;
use Carbon\Carbon;
use App\ExamSchedule;
use App\ExamAttendance;
use App\ExamSubjectMarkConfig;
use App\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ExamController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$exams = Exam::where("session_id", get_option("academic_year"))
			->orderBy('id', 'desc')
			->get();
		return view('backend.exam.exam.list', compact('exams'));
	}

	public function exam_schedule(Request $request, $type = 'view')
	{
		$exam = $request->input('exam');
		$class = $request->input('class');
		$group = $request->input('group');
		$examTypeName = $request->input('exam_type');
		$examDateTime = $request->input('date_time');
		$exam_types = ExamType::all();

		if ($exam != "" && $class != "") {
			$subjects = Subject::select('*', 'exam_schedules.id as schedules_id', 'subjects.id as subject_id')
				->leftJoin('exam_schedules', function ($join) use ($exam) {
					$join->on('subjects.id', '=', 'exam_schedules.subject_id');
					$join->where('exam_schedules.exam_id', $exam);
				})
				->where('subjects.class_id', $class)
				->get();

			foreach ($subjects as $subject) {
				$subject->exam_schedule_id = $subject->schedules_id;
				// Get Exam Subject Mark Config for this subject and exam.
				$examSubjectMarkConfig = ExamSubjectMarkConfig::where('exam_id', $exam)
					->where('subject_id', $subject->subject_id)
					->first();
				if ($examSubjectMarkConfig) {
					$subject->objective = $examSubjectMarkConfig->objective;
					$subject->opm = $examSubjectMarkConfig->opm;
					$subject->written = $examSubjectMarkConfig->written;
					$subject->wpm = $examSubjectMarkConfig->wpm;
					$subject->practical = $examSubjectMarkConfig->practical;
					$subject->ppm = $examSubjectMarkConfig->ppm;
					$subject->total = $examSubjectMarkConfig->total;
				}
			}
			return view('backend.exam.schedule.create', compact('subjects', 'class', 'group', 'exam', 'type', 'exam_types', 'examTypeName', 'examDateTime'));
		} else {
			return view('backend.exam.schedule.create', compact('class', 'group', 'exam', 'type', 'exam_types', 'examTypeName', 'examDateTime'));
		}
	}

	public function store_exam_schedule(Request $request)
	{
		$request->validate([
			'exam_id' => 'required|numeric',
			'date_time' => 'required',
			'class_id' => 'required|numeric',
		]);

		$exam = $request->exam_id;
		$examTypeName = $request->exam_type_id;
		$examDateTime = $request->date_time;
		$class = $request->class_id;
		$group = $request->group_id;

		$examSchedules = [];
		foreach ($request->subject_ids as $subject_id => $mark_config_data) {
			if (empty($mark_config_data['date']) || empty($mark_config_data['start_time']) || empty($mark_config_data['end_time']) || empty($mark_config_data['room'])) {
				continue;
			}

			$date = $mark_config_data['date'] ?? null;
			$start_time = $mark_config_data['start_time'] ?? null;
			$end_time = $mark_config_data['end_time'] ?? null;
			$room = $mark_config_data['room'] ?? null;
			$examSchedules[] = [
				'exam_id' => $exam,
				'class_id' => $class,
				'subject_id' => $subject_id,
				'date' => $date,
				'start_time' => $start_time,
				'end_time' => $end_time,
				'room' => $room,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			];
		}

		foreach ($examSchedules as $examSchedule) {
			ExamSchedule::updateOrInsert(
				[
					'exam_id' => $examSchedule['exam_id'],
					'class_id' => $examSchedule['class_id'],
					'subject_id' => $examSchedule['subject_id'],
				],
				$examSchedule
			);
		}

		$configs = [];
		foreach ($request->subject_ids as $subject_id => $mark_config_data) {
			$examSchedule = ExamSchedule::where('exam_id', $exam)
				->where('class_id', $class)
				->where('subject_id', $subject_id)
				->first();

			if (empty($examSchedule) || empty($mark_config_data['objective']) && empty($mark_config_data['opm']) && empty($mark_config_data['written']) && empty($mark_config_data['wpm']) && empty($mark_config_data['practical']) && empty($mark_config_data['ppm']) && empty($mark_config_data['total'])) {
				continue;
			}

			$objective = $mark_config_data['objective'] ?? null;
			$opm = $mark_config_data['opm'] ?? null;
			$written = $mark_config_data['written'] ?? null;
			$wpm = $mark_config_data['wpm'] ?? null;
			$practical = $mark_config_data['practical'] ?? null;
			$ppm = $mark_config_data['ppm'] ?? null;
			$total = $mark_config_data['total'] ?? null;
			$configs[] = [
				'exam_id' => $exam,
				'exam_type_id' => $examTypeName,
				'exam_schedule_id' => $examSchedule->id,
				'date_time' => $examDateTime,
				'class_id' => $class,
				'group_id' => $group,
				'subject_id' => $subject_id,
				'objective' => $objective,
				'opm' => $opm,
				'written' => $written,
				'wpm' => $wpm,
				'practical' => $practical,
				'ppm' => $ppm,
				'total' => $total,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			];
		}

		foreach ($configs as $config) {
			ExamSubjectMarkConfig::updateOrInsert(
				[
					'exam_id' => $config['exam_id'],
					'subject_id' => $config['subject_id'],
				],
				$config
			);
		}

		return redirect('exams/all-exams')->with('success', _lang('Saved Successfully'));
	}


	public function exam_attendance(Request $request)
	{
		$exam = $request->input('exam');
		$class_id = $request->input('class_id');
		$section_id = $request->input('section_id');
		$subject_id = $request->input('subject_id');

		if ($exam != "" && $class_id != "" && $section_id != "" && $subject_id != "") {

			$attendance = Student::select('*', 'exam_attendances.id AS attendance_id')
				->leftJoin('exam_attendances', function ($join) use ($exam, $subject_id, $section_id) {
					$join->on('exam_attendances.student_id', '=', 'students.id');
					$join->where('exam_attendances.exam_id', '=', $exam);
					$join->where('exam_attendances.subject_id', '=', $subject_id);
					$join->where('exam_attendances.section_id', '=', $section_id);
				})
				->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
				->where('student_sessions.class_id', $class_id)
				->where('student_sessions.section_id', $section_id)
				->orderBy('student_sessions.roll', 'ASC')
				->get();
			return view('backend.exam.attendance.attendance', compact('attendance', 'class_id', 'section_id', 'exam', 'subject_id'));
		} else {
			return view('backend.exam.attendance.attendance', compact('class_id', 'section_id', 'exam', 'subject_id'));
		}
	}

	public function store_exam_attendance(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'attendance' => 'required',
		]);
		if ($validator->fails()) {

			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			} else {
				return redirect('exams/attendance')
					->withErrors($validator)
					->withInput();
			}
		}

		for ($i = 0; $i < count($request->student_id); $i++) {
			$temp = array();
			$temp['exam_id'] = (int)$request->exam_id[$i];
			$temp['subject_id'] = (int)$request->subject_id[$i];
			$temp['student_id'] = (int)$request->student_id[$i];
			$temp['class_id'] = (int)$request->class_id[$i];
			$temp['section_id'] = (int)$request->section_id[$i];
			$temp['date'] = $request->date;

			$studentAtt = ExamAttendance::firstOrNew($temp);
			$studentAtt->exam_id = $temp['exam_id'];
			$studentAtt->subject_id = $temp['subject_id'];
			$studentAtt->student_id = $temp['student_id'];
			$studentAtt->class_id = $temp['class_id'];
			$studentAtt->section_id = $temp['section_id'];
			$studentAtt->date = $temp['date'];
			$studentAtt->attendance = isset($request->attendance[$i]) ? $request->attendance[$i][0] : 0;
			$studentAtt->save();
		}


		if (!$request->ajax()) {
			return redirect('/exams/attendance')->with('success', _lang('Saved Successfully'));
		} else {
			return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Saved Successfully')]);
		}
	}

	public function get_exam(Request $request)
	{
		$results = Exam::select('exams.*')
			->join('exam_schedules', 'exam_schedules.exam_id', '=', 'exams.id')
			->where('exam_schedules.subject_id', $request->subject_id)
			->where('exams.session_id', get_option('academic_year'))
			->orderBy('exams.id', 'DESC')->get();
		$sections = '';
		$sections .= '<option value="">' . _lang('Select One') . '</option>';
		foreach ($results as $data) {
			$sections .= '<option value="' . $data->id . '">' . $data->name . '</option>';
		}
		return $sections;
	}

	public function get_subject(Request $request)
	{
		$results = Subject::where("class_id", $request->class_id)->get();
		$sections = '';
		$sections .= '<option value="">' . _lang('Select One') . '</option>';
		foreach ($results as $data) {
			$sections .= '<option value="' . $data->id . '">' . $data->subject_name . '</option>';
		}
		return $sections;
	}

	public function get_teacher_subject(Request $request)
	{
		$results = Subject::join("assign_subjects", "subjects.id", "assign_subjects.subject_id")
			->select('subjects.*')
			->where("assign_subjects.teacher_id", get_teacher_id())
			->where("assign_subjects.section_id", $request->section_id)
			->where("subjects.class_id", $request->class_id)->get();

		$sections = '';
		$sections .= '<option value="">' . _lang('Select One') . '</option>';
		foreach ($results as $data) {
			$sections .= '<option value="' . $data->id . '">' . $data->subject_name . '</option>';
		}
		return $sections;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		if (!$request->ajax()) {
			return view('backend.exam.exam.create');
		} else {
			return view('backend.exam.exam.modal.create');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required|max:191',
			'date_time' => 'required',
			'note' => 'nullable',
			'exam_code' => 'unique:exams,exam_code',
		]);

		if ($validator->fails()) {
			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			} else {
				return redirect('exams/create')
					->withErrors($validator)
					->withInput();
			}
		}

		$exam = new Exam();
		$exam->name = $request->input('name');
		$exam->date_time = $request->input('date_time');
		if (!empty($request->input('exam_code'))) {
			$exam->exam_code = $request->input('exam_code');
		} else {
			$randnum = rand(1111111111, 9999999999);
			$exam->exam_code = $randnum;
		}
		$exam->note = $request->input('note');
		$exam->session_id = get_option('academic_year');
		$exam->save();

		if (!$request->ajax()) {
			return redirect('exams')->with('success', _lang('Information has been added sucessfully'));
		} else {
			return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Information has been added sucessfully'), 'data' => $exam]);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$exam = Exam::find($id);
		if (!$request->ajax()) {
			return view('backend.exam.exam.view', compact('exam', 'id'));
		} else {
			return view('backend.exam.exam.modal.view', compact('exam', 'id'));
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id)
	{
		$exam = Exam::find($id);
		if (!$request->ajax()) {
			return view('backend.exam.exam.edit', compact('exam', 'id'));
		} else {
			return view('backend.exam.exam.modal.edit', compact('exam', 'id'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{

		$validator = Validator::make($request->all(), [
			'name' => 'required|max:191',
			'date_time' => 'required',
			'note' => 'nullbale',
			'exam_code' => 'unique:exams,exam_code,' . $id,
		]);

		if ($validator->fails()) {
			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			} else {
				return redirect()->route('exams.edit', $id)
					->withErrors($validator)
					->withInput();
			}
		}

		$exam = Exam::find($id);
		$exam->name = $request->input('name');
		$exam->date_time = $request->input('date_time');
		if (!empty($request->input('exam_code'))) {
			$exam->exam_code = $request->input('exam_code');
		} else {
			$randnum = rand(1111111111, 9999999999);
			$exam->exam_code = $randnum;
		}
		$exam->note = $request->input('note');
		$exam->session_id = get_option('academic_year');

		$exam->save();

		if (!$request->ajax()) {
			return redirect('exams')->with('success', _lang('Information has been updated sucessfully'));
		} else {
			return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Information has been updated sucessfully'), 'data' => $exam]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$exam = Exam::find($id);
		$exam->delete();
		return redirect('exams')->with('success', _lang('Information has been deleted sucessfully'));
	}

	// get date on select exam

	public function getDataBySelection(Request $request)
	{
		$selectedValue = $request->input('selected_value');

		$dateTime = Exam::where('id', $selectedValue)->select('date_time')->first();

		// Your logic to fetch data based on the selected value

		return response()->json(['data' => $dateTime]);
	}

	public function getAllExam()
	{
		$examSubjectMarkConfigs = ExamSubjectMarkConfig::select('exam_id', 'class_id', 'date_time')
			->groupBy('exam_id', 'class_id')
			->orderBy('id', 'desc')
			->get();

		$allExams = Exam::all();
		$allclasses = DB::table('classes')->get();

		return view('backend.exam.subject_mark_config.index', compact('examSubjectMarkConfigs', 'allExams', 'allclasses'));
	}

	public function getAllExamByExamID($exam_id, $class_id)
	{
		$examSubjectMarkConfigs = ExamSubjectMarkConfig::select('exam_id', 'class_id', 'date_time', 'subject_id', 'objective', 'opm', 'written', 'wpm', 'practical', 'ppm', 'total')
			->where('exam_id', $exam_id)
			->where('class_id', $class_id)
			->get();

		$allExam = Exam::where('id', $exam_id)->first();
		$allclasses = DB::table('classes')->get();

		$subjects = Subject::select('subject_name', 'id')->get();

		return view('backend.exam.subject_mark_config.list', compact('examSubjectMarkConfigs', 'allExam', 'allclasses', 'subjects'));
	}
}
