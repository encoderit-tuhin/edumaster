<?php

namespace App\Http\Controllers;

use App\StudentResultReport;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Imports\StudentResultReportsImport;
use App\Services\StudentResultReportService;
use App\Imports\LibraryStudentResultReportsImport;
use App\Http\Requests\StudentResultReportCreateRequest;

class StudentResultReportController extends Controller
{
    public function __construct(private readonly StudentResultReportService $studentResultReportService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.student_result_reports.index', [
            'student_result_reports' => $this->studentResultReportService->getStudentResultReports(),
        ]);
    }

    public function create(): View|Factory
    {
        return view('backend.student_result_reports.bulk-upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'xlsx_file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('xlsx_file');
        $import = new StudentResultReportsImport();
        Excel::import($import, $file);
        $importedData = $import->data;

        DB::beginTransaction();
        try {
            foreach ($importedData as $row) {
                $studentResultReport = new StudentResultReport();
                $studentResultReport->student_id = $row['student_id'];
                $studentResultReport->roll_no = $row['roll_no'];
                $studentResultReport->name = $row['name'];
                $studentResultReport->group = $row['group'];
                $studentResultReport->category = $row['category'];
                $studentResultReport->gender = $row['gender'];
                $studentResultReport->date_of_birth = $row['date_of_birth'];
                $studentResultReport->religion = $row['religion'];
                $studentResultReport->father_name = $row['fathers_name'];
                $studentResultReport->mother_name = $row['mothers_name'];
                $studentResultReport->mobile_no = $row['mobile_no'];
                $studentResultReport->save();
            }

            DB::commit();
            return redirect('student-result-reports')->with('success', _lang('Student Result Reports Bulk upload successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function show($id)
    {
        $studentData = $this->studentResultReportService->findStudentResultReportById($id);

        return view('backend.student_result_reports.report-generate', compact('studentData'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $studentData = $this->studentResultReportService->deleteStudentResultReportById($id);

        if (!$studentData) {
            return redirect('student_result_reports')->with('error', _lang('Something went wrong. StudentResultReport can not be delete.'));
        }

        return redirect('student_result_reports')->with('success', _lang('Information has been deleted'));
    }

    public function downloadDemoFile()
    {
        $filePath = public_path('uploads/result_demo_xlsx_file/result_demo_xlsx_file.xlsx');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'result_demo_xlsx_file.xlsx', [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
        }

        abort(404, 'File not found');
    }
}
