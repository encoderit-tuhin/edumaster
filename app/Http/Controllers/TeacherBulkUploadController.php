<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Imports\TeachersImport;
use Illuminate\Support\Facades\DB;
use App\Services\DepartmentService;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class TeacherBulkUploadController extends Controller
{
    public function __construct(private readonly DepartmentService $departmentService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departmentService->getDepartments();

        return view('backend.teachers.teacher-bulk-upload', compact('departments'));
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
            'designation' => 'required',
            'department_id' => 'required',
            'sl_no.*' => 'required',
            'name.*' => 'required',
            'gender.*' => 'required',
            'religion.*' => 'required',
            'mobile_no.*' => 'required',
            'number_of_teacher' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            for ($i = 0; $i < $validatedData['number_of_teacher']; $i++) {
                $user = new User();
                $user->name = $validatedData['name'][$i];
                $user->email = $validatedData['mobile_no'][$i];
                $user->password = Hash::make($validatedData['mobile_no'][$i]);
                $user->user_type = 'Teacher';
                $user->phone = $validatedData['mobile_no'][$i];

                if ($user->save()) {
                    DB::table('teachers')->insert([
                        'user_id' => $user->id,
                        'department_id' => $validatedData['department_id'],
                        'name' => $validatedData['name'][$i],
                        'designation' => $validatedData['designation'],
                        'sl' => $validatedData['sl_no'][$i],
                        'gender' => $validatedData['gender'][$i],
                        'religion' => $validatedData['religion'][$i],
                        'phone' => $validatedData['mobile_no'][$i],
                    ]);
                }
            }

            DB::commit();
            return redirect('teachers')->with('success', _lang('Teacher Bulk upload successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileIndex()
    {
        $departments = $this->departmentService->getDepartments();

        return view('backend.teachers.teacher-bulk-file-upload', compact('departments'));
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
            'department_id' => 'required',
            'designation' => 'required',
        ]);

        $file = $request->file('xlsx_file');

        $import = new TeachersImport();
        Excel::import($import, $file);
        $importedData = $import->data;

        DB::beginTransaction();
        try {
            foreach ($importedData as $row) {
                $user = new User();
                $user->name = $row['name'];
                $user->email = $row['mobile_no'];
                $user->password = Hash::make($row['mobile_no']);
                $user->user_type = 'Teacher';
                $user->phone = $row['mobile_no'];

                if ($user->save()) {
                    DB::table('teachers')->insert([
                        'user_id' => $user->id,
                        'department_id' => $request->department_id,
                        'designation' => $request->designation,
                        'name' => $row['name'],
                        'sl' => $row['roll_no'],
                        'gender' => $row['gender'],
                        'religion' => $row['religion'],
                        'phone' => $row['mobile_no'],
                    ]);
                }
            }
            DB::commit();
            return redirect('teachers')->with('success', _lang('Teacher Bulk upload successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function downloadDemoFile()
    {
        $filePath = public_path('uploads/teacher_xlsx_file/teacher_demo.xlsx');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'teacher_demo.xlsx', [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
        }

        abort(404, 'File not found');
    }
}
