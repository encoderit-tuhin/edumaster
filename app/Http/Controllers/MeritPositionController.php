<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\Exam;
use App\ExamAttendance;
use App\Mark;
use App\MeritScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeritPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.marks.merit.merit_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function process()
    {
        return view('backend.marks.merit.process');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marks = Mark::with('markDetails')
            ->where('exam_id', $request->exam_id)
            ->where('class_id', $request->class_id)
            ->get();
        $exam = Exam::where('id', $request->exam_id)->first();
        $class = ClassModel::where('id', $request->class_id)->first();

        if (count($marks) > 0) {
            foreach ($marks as $mark) {
                $attendance = ExamAttendance::where('exam_id', $mark->exam_id)
                    ->where('student_id', $mark->student_id)
                    ->first();
                if ($attendance->attendance == 1) {
                    $meritScore = MeritScore::where('class_id', $mark->class_id)
                        ->where('section_id', $mark->section_id)
                        ->where('student_id', $mark->student_id)
                        ->first();
                    if (isset($meritScore)) {
                        $score = $meritScore->score;
                        $score = $score + $mark->markDetails[0]->mark_value;
                        $meritScore->update(['score' => $score]);
                    } else {
                        MeritScore::create([
                            'class_id' => $mark->class_id,
                            'section_id' => $mark->section_id,
                            'student_id' => $mark->student_id,
                            'session_id' => $exam->session_id,
                            'score' => $mark->markDetails[0]->mark_value,
                        ]);
                    }
                } else {
                    MeritScore::create([
                        'class_id' => $mark->class_id,
                        'section_id' => $mark->section_id,
                        'student_id' => $mark->student_id,
                        'session_id' => $exam->session_id,
                        'score' => 0,
                    ]);
                }
            }
            if (!$request->ajax()) {
                return redirect('merit-list')->with('success', _lang('Merit Processed Successfully'));
            } else {
                return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Saved Successfully')]);
            }
        } else {
            return redirect('merit-list')->with('error', _lang('Mark is not registered for class:' . $class->class_name . 'or' . $exam->name));
        }
    }

    /**
     * Display the specified resource.
     */
    public function showMeritList(Request $request)
    {
        return Auth::session();
        $class_wise = MeritScore::join('students', 'merit_scores.student_id', 'students.id')
            ->join('academic_years as ay',)
            ->where('class_id', $request->class)
            ->select('students.*', 'merit_scores.score')
            ->orderBy('merit_scores.score', 'desc')->get();
        return view('backend.marks.merit.merit_list', ['class_wise' => $class_wise]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
