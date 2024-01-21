<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentSession;
use App\StudentMigration;
use Illuminate\Http\Request;
use App\StudentOnlineRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Services\StudentSessionService;

class StudentMigrationController extends Controller
{
    public function __construct(private readonly StudentSessionService $studentSessionService)
    {
    }


    public function index()
    {
        if (Route::currentRouteName() === 'student-migration.index') {
            $type = 'merit_and_without_merit';
            return view('backend.migration.index', compact('type'));
        } else if (Route::currentRouteName() === 'student-migration-pushback.index') {
            $type = 'pushback';
            return view('backend.migration.index', compact('type'));
        }
    }

    function migration()
    {
        return view('backend.migration.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users' => 'required|array',
            'section_id' => 'required',
            'migrate_section_id' => 'required',
            'group_id' => 'required',
            'class_id' => 'required',
            'migrate_class_id' => 'required',
            'prev_roll' => 'required',
            'new_roll' => 'required',
            'type' => 'required|string',
            'academic_year' => 'required|string',
        ]);

        $studentIds = $request->input('users');
        $prev_class_id = $request->input('class_id');
        $class_id = $request->input('migrate_class_id');
        $prev_section_id = $request->input('section_id');
        $section_id = $request->input('migrate_section_id');
        $group_id = $request->input('group_id');
        $type = $request->input('type');
        $prev_roll = $request->input('prev_roll');
        $new_roll = $request->input('new_roll');
        $academic_year = $request->input('academic_year');

        $session_table_id = $request->input('session_table_id');

        DB::beginTransaction();
        foreach ($studentIds as $key => $studentId) {
            $migrate = new StudentMigration();
            $migrate->student_id = $studentId;
            $migrate->prev_section_id = $prev_section_id;
            $migrate->section_id = $section_id;
            $migrate->group_id = $group_id;
            $migrate->prev_class_id = $prev_class_id[$key];
            $migrate->class_id = $class_id;
            $migrate->new_roll = $new_roll[$key];
            $migrate->prev_roll = $prev_roll[$key];
            $migrate->type = $type;
            $migrate->academic_year = $academic_year;

            $migrate->save();

            $session = StudentSession::find($session_table_id[$key]);

            if (!empty($session)) {

                $session->section_id = $section_id;
                $session->class_id = $class_id;
                $session->roll = $new_roll[$key];
                $session->update();
            }

            $studentOnlineRegistration = StudentOnlineRegistration::where('user_id', $studentId)->first();

            if (!empty($studentOnlineRegistration)) {

                $studentOnlineRegistration->section_id = $section_id;
                $studentOnlineRegistration->group_id = $group_id;
                $studentOnlineRegistration->class_id = $class_id;
                $studentOnlineRegistration->roll = $new_roll[$key];
                $studentOnlineRegistration->update();
            }
        }
        DB::commit();
        return back()->with('success', "Migrate Success");
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentMigration $studentMigration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentMigration $studentMigration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentMigration $studentMigration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentMigration $studentMigration)
    {
        //
    }

    function get_student_for_migration($class_id, $section_id)
    {
        if ($class_id != "" && $section_id !== "") {
            $students = Student::join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftjoin('parents', 'students.parent_id', '=', 'parents.id')
                ->select('students.*', 'parents.parent_name', 'parents.phone as parent_phone', 'student_sessions.roll')
                ->where('student_sessions.session_id', get_option('academic_year'))
                ->where('student_sessions.class_id', $class_id)
                ->where('student_sessions.section_id', $section_id)
                ->with('studentSession', 'studentGroup')
                ->get();
            return view('backend.migration.student-filter-data', compact('students'));
        }
    }
}
