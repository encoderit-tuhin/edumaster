<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Student;
use App\StudentSession;
use App\MarkDetails;
use Illuminate\Http\Request;
use App\Services\SectionService;
use Illuminate\Support\Facades\DB;
use App\Repositories\StudentRepository;
use App\Services\StudentSessionService;

class MarkInputController extends Controller
{
    public function __construct(
        private readonly StudentSessionService $studentSessionService,
        private readonly SectionService $sectionService,
        private readonly StudentRepository $studentRepo
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function sectionWise()
    {
        return view('backend.marks.mark_input.section_wise');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sectionWiseSearch($subject_id, $exam_id)
    {
        if ($subject_id != "" && $exam_id !== "") {
            $students = Student::join('users', 'users.id', '=', 'students.user_id')
                ->leftjoin('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftjoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                ->leftjoin('exams', 'exams.session_id', '=', 'student_sessions.id')
                ->leftjoin('subjects', 'subjects.class_id', '=', 'classes.id')
                ->where('subjects.id', $subject_id)
                ->where('exams.id', $exam_id)
                ->select('students.*', 'exams.name as exam_name', 'exams.id as exam_id', 'student_sessions.roll as roll')
                ->orderBy('student_sessions.roll', 'desc')
                ->get();

            return view('backend.marks.mark_input.partial.section_wise_filter', compact('students'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function markInputNew()
    {
        return view('backend.mark2.index', [
            'sections' => $this->sectionService->getSections(),

        ]);
    }
    public function getStudentsForAddMark(Request $request)
    {
        $subject = $request->subject_id;
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $group_id = $request->group_id;
        $session_id = $request->session_id;

        $marks = Mark::where('class_id', $request['class_id'])
            ->where('section_id', $request['section_id'])
            ->where('exam_id', $request['exam_id'])
            ->where('group_id', $request['group_id'])
            ->where('session_id', $request['session_id'])
            ->where('subject_id', $request['subject_id'])
            ->where('paper_id', $request['paper_id'])
            ->join('mark_details', 'mark_details.mark_id', 'marks.id')
            ->get();

        if (count($marks) > 0) {
            return view('backend.mark2.create', compact('marks'));
        } else {
            $marks = StudentSession::where('session_id', $session_id)
                ->where('class_id', $class_id)
                ->where('section_id', $section_id)
                ->with('student')
                ->get();
            return view('backend.mark2.create', compact('marks'));
        }

    }
    public function updateMarkInput(Request $request)
    {
        return view('backend.mark2.form', ['sections' => $this->sectionService->getSections()]);
    }

    public function markInputStore(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
            'class' => 'required',
            'group' => 'required',
            'section' => 'required',
            'subject_id' => 'required',
            'paper' => 'required',
            'student_id' => 'required|array',
            'session_id' => 'required',
        ]);
        // dd($request);
        $attendance = $request->input('attendance');
        $monthly_test = $request->input('monthly_test');
        $objective = $request->input('objective');
        $written = $request->input('written');
        $practical = $request->input('practical');
        $mark_id = $request->input('mark_id');

        $studentIds = $request->input('student_id');
        try {
            DB::beginTransaction();

            foreach ($studentIds as $key => $studentId) {
                // dd($studentIds);
                
                $marks = Mark::updateOrCreate(
                    [
                        'exam_id' => $request->exam_id,
                        'class_id' => $request->class,
                        'group_id' => $request->group,
                        'section_id' => $request->section,
                        'subject_id' => $request->subject_id,
                        "paper_id" => $request->paper,
                        'student_id' => $studentId,
                        'session_id' => $request->session_id,
                    ],
                    [
                        'exam_id' => $request->exam_id,
                        'class_id' => $request->class,
                        'group_id' => $request->group,
                        'section_id' => $request->section,
                        'subject_id' => $request->subject_id,
                        "paper_id" => $request->paper,
                        'student_id' => $studentId,
                        'session_id' => $request->session_id
                    ]
                );
                // $existingRecord = Mark::where([
                //     'exam_id' => $request->exam_id,
                //     'class_id' => $request->class,
                //     'group_id' => $request->group,
                //     'section_id' => $request->section,
                //     'subject_id' => $request->subject_id,
                //     "paper_id" => $request->paper,
                //     'student_id' => $studentId,
                //     'session_id' => $request->session_id,
                // ])->first();

               
                // if ($existingRecord) {
                   
                //     $existingRecord->update([
                //         'exam_id' => $request->exam_id,
                //         'class_id' => $request->class,
                //         'group_id' => $request->group,
                //         'section_id' => $request->section,
                //         'subject_id' => $request->subject_id,
                //         "paper_id" => $request->paper,
                //         'student_id' => $studentId,
                //         'session_id' => $request->session_id,
                //     ]);
                // } else {
                   
                //     $newRecord = Mark::create([
                //         'exam_id' => $request->exam_id,
                //         'class_id' => $request->class,
                //         'group_id' => $request->group,
                //         'section_id' => $request->section,
                //         'subject_id' => $request->subject_id,
                //         "paper_id" => $request->paper,
                //         'student_id' => $studentId,
                //         'session_id' => $request->session_id,
                //         // Other fields if needed
                //     ]);
                    
                // }
                // dd($mark_id);

                $markDtId = MarkDetails::where('mark_id', $mark_id[$key])->first();
                if ($markDtId) {
                    $markVal = $attendance[$key][0] + $monthly_test[$key][0] + $objective[$key][0] + $written[$key][0] + $practical[$key][0];

                    $markDtId->mark_type = 'exam';
                    $markDtId->mark_value = $markVal;
                    $markDtId->attendance = $attendance[$key][0] ?? 0;
                    $markDtId->monthly_test = $monthly_test[$key][0] ?? 0;
                    $markDtId->objective = $objective[$key][0] ?? 0;
                    $markDtId->written = $written[$key][0] ?? 0;
                    $markDtId->practical = $practical[$key][0] ?? 0;
                    $markDtId->save();
                } else {
                    $markVal = $attendance[$key][0] + $monthly_test[$key][0] + $objective[$key][0] + $written[$key][0] + $practical[$key][0];

                    $marksDt = new MarkDetails();
                    $marksDt->mark_id = $marks->id;

                    $marksDt->mark_type = 'exam';
                    $marksDt->mark_value = $markVal;
                    $marksDt->attendance = $attendance[$key][0] ?? 0;
                    $marksDt->monthly_test = $monthly_test[$key][0] ?? 0;
                    $marksDt->objective = $objective[$key][0] ?? 0;
                    $marksDt->written = $written[$key][0] ?? 0;
                    $marksDt->practical = $practical[$key][0] ?? 0;
                    $marksDt->save();

                }
            }
            DB::commit();
            return back()->with('success', 'Mark Inserted Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
