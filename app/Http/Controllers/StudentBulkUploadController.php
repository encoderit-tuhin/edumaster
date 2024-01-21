<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\StudentSession;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\SectionRepository;

class StudentBulkUploadController extends Controller
{
    private $sectionRepo;

    public function __construct(SectionRepository $sectionRepo)
    {
        $this->sectionRepo = $sectionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = $this->sectionRepo->getSections();

        return view('backend.students.student-bulk-upload', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class' => 'required',
            'academic_year' => 'required',
            'section' => 'required',
            'group' => 'required',
            'number_of_student' => 'required|integer',
            'roll_no.*' => 'required',
            'name.*' => 'required',
            'gender.*' => 'required',
            'religion.*' => 'required',
            'father_name.*' => 'required',
            'mother_name.*' => 'required',
            'mobile_no.*' => 'required',
        ]);

        DB::beginTransaction();
        try {
            for ($i = 0; $i < $validatedData['number_of_student']; $i++) {
                $user = new User();
                $user->name = $validatedData['name'][$i];
                $user->email = $validatedData['mobile_no'][$i];
                $user->password = Hash::make($validatedData['mobile_no'][$i]);
                $user->user_type = 'Student';
                $user->phone = $validatedData['mobile_no'][$i];

                if ($user->save()) {
                    $student = new Student();
                    $student->user_id = $user->id;
                    $student->group = $validatedData['group'];
                    $student->first_name = $validatedData['name'][$i];
                    $student->gender = $validatedData['gender'][$i];
                    $student->religion = $validatedData['religion'][$i];
                    $student->father_name = $validatedData['father_name'][$i];
                    $student->mother_name = $validatedData['mother_name'][$i];
                    $student->phone = $validatedData['mobile_no'][$i];
                }

                if ($student->save()) {
                    $studentSession = new StudentSession();
                    $studentSession->session_id = $validatedData['academic_year'];
                    $studentSession->student_id = $student->id;
                    $studentSession->class_id = $validatedData['class'];
                    $studentSession->section_id = $validatedData['section'];
                    $studentSession->roll = $validatedData['roll_no'][$i];
                    $studentSession->optional_subject = $request->optional_subject;
                    $studentSession->save();
                }
            }

            DB::commit();
            return redirect('students')->with('success', _lang('Student Bulk upload successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('students')->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileIndex()
    {
        $sections = $this->sectionRepo->getSections();

        return view('backend.students.student-bulk-file-upload', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileStore(Request $request)
    {
        $request->validate([
            'xlsx_file' => 'required|mimes:xlsx,csv',
            'class' => 'required',
            'academic_year' => 'required',
            'section' => 'required',
            'group' => 'required',
        ]);

        $file = $request->file('xlsx_file');

        $import = new StudentsImport();
        Excel::import($import, $file);
        $importedData = $import->data;

        DB::beginTransaction();
        try {
            foreach ($importedData as $row) {
                $user = new User();
                $user->name = $row['name'];
                $user->email = $row['mobile_no'];
                $user->password = Hash::make($row['mobile_no']);
                $user->user_type = 'Student';
                $user->phone = $row['mobile_no'];

                if ($user->save()) {
                    $student = new Student();
                    $student->user_id = $user->id;
                    $student->group = $request->group;
                    $student->first_name = $row['name'];
                    $student->gender = $row['gender'];
                    $student->religion = $row['religion'];
                    $student->father_name = $row['fathers_name'];
                    $student->mother_name = $row['mothers_name'];
                    $student->phone = $row['mobile_no'];
                }

                if ($student->save()) {
                    $studentSession = new StudentSession();
                    $studentSession->session_id = $request->academic_year;
                    $studentSession->student_id = $student->id;
                    $studentSession->class_id = $request->class;
                    $studentSession->section_id = $request->section;
                    $studentSession->roll = $row['roll_no'];
                    $studentSession->optional_subject = $request->optional_subject;
                    $studentSession->save();
                }
            }
            DB::commit();
            return redirect('students')->with('success', _lang('Student Bulk upload successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function downloadDemoFile()
    {
        $filePath = public_path('uploads/student_xlsx_file/student_demo.xlsx');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'student_demo.xlsx', [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
        }

        abort(404, 'File not found');
    }
}
