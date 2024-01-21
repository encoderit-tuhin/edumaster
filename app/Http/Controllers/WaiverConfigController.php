<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Services\SectionService;
use App\StudentWaiverConfig;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;

class WaiverConfigController extends Controller
{
    public function __construct(
        private readonly SectionService $sectionService
    ) {
    }

    public function index(): View|Factory
    {
        $sectionId = (int) request()->section_id;
        $groupId = (int) request()->group;
        $studentCategoryId = (int) request()->student_category_id;

        $students = Student::query()
            ->select('users.*', 'student_sessions.roll', 'classes.class_name', 'sections.section_name', 'students.id as id', 'student_groups.group_name', 'students.student_category_id')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->leftJoin('student_groups', 'students.group', '=', 'student_groups.id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('users.user_type', 'Student')
            ->where('student_sessions.section_id', $sectionId)
            ->where('students.group', $groupId)
            ->where('students.student_category_id', $studentCategoryId)
            ->orderBy('student_sessions.roll', 'ASC')
            ->get();

        $waiverConfigLists = StudentWaiverConfig::join('students', 'student_waiver_configs.student_id', '=', 'students.id')
        ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
        ->join('fee_heads', 'student_waiver_configs.fee_head_id', '=', 'fee_heads.id')
        ->join('waivers', 'student_waiver_configs.waiver_id', '=', 'waivers.id')
        ->select('student_waiver_configs.id', 'student_waiver_configs.amount', 'student_waiver_configs.student_id', 'students.first_name', 'students.last_name', 'student_sessions.roll', 'fee_heads.name', 'waivers.waiver')
        ->get();

        return view('backend.waiver_config.index', [
            'students' => $students, 'waiverConfigLists' => $waiverConfigLists,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'students' => 'required|array',
            'fee_head_id' => 'nullable',
            'wavier_id' => 'required',
            'waiver_amount' => 'required',
        ]);

        $students = $request->input('students');
        $fee_head_id = $request->input('fee_head_id');
        $wavier_id = $request->input('wavier_id');
        $waiver_amount = $request->input('waiver_amount');
        DB::beginTransaction();
        foreach ($students as $student) {
            $studenWaiverConfig = new StudentWaiverConfig();
            $studenWaiverConfig->student_id = $student;
            $studenWaiverConfig->fee_head_id = $fee_head_id;
            $studenWaiverConfig->waiver_id = $wavier_id;
            $studenWaiverConfig->amount = $waiver_amount;
            $studenWaiverConfig->save();
        }
        DB::commit();
        return redirect('waiver-config')->with('success', "Waiver Config Success");
    }

    public function destroy($id)
    {
        $studentWaiverConfig = StudentWaiverConfig::where('id', $id)->first();

        if(!empty($studentWaiverConfig))
        {
            $studentWaiverConfig->delete();
            return redirect('waiver-config')->with('success', _lang('Successfully Waiver Config Deleted.'));
        }else{
            return redirect('waiver-config')->with('error', _lang('Something went wrong.'));
        }
    }
}
