<?php

namespace App\Http\Controllers;

use App\Fee;
use PDF;
use App\Student;
use App\AbsentFine;
use App\AcademicYear;
use App\FeeRecord;
use App\FeeSubHead;
use App\StudentSession;
use App\StudentCollection;
use Illuminate\Http\Request;
use App\StudentCollectionDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use App\Traits\StudentCollectionTrait;
use Illuminate\Contracts\View\Factory;
use App\Services\StudentSessionService;
use App\StudentCollectionDetailsSubHead;
use App\Http\Requests\StudentCollectionCreateRequest;

class QuickCollectionController extends Controller
{
    use StudentCollectionTrait;

    public function __construct(private readonly StudentSessionService $studentSessionService)
    {
    }

    public function index(): View|Factory
    {
        $sectionId = (int) request()->section_id;

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
            ->orderBy('student_sessions.roll', 'ASC')
            ->get();

        return view('backend.quick_collection.index', [
            'students' => $students
        ]);
    }

    public function store(StudentCollectionCreateRequest $request)
    {
        @ini_set('max_execution_time', 0);
        // dd($request->all());
        try {
            $studentCollection = $this->createCollection(
                $request->all()
            );
            // After successfull creation, redirect to PDF page - student-collection.invoice route.
            session()->flash(
                'success',
                __('Student collection has been created. Please download or print the PDF if needs.')
            );
            return redirect()->route('student-collection.invoice', $studentCollection->id);
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function show($id)
    {
        $attendance = DB::table('student_attendances')
            ->select(DB::raw('month(date) as month'), DB::raw('count(*) as absent'))
            ->whereYear('date', 2023)
            ->where('student_id', $id)
            ->where('attendance', 2)
            ->groupBy('month')
            ->orderBy('date', 'asc')
            ->get();
        $session = StudentSession::where('student_id', $id)->first();

        $amountConfig = Fee::where('section_id', $session->section_id)
            ->where('class_id', $session->class_id)
            ->with('feeHead')
            ->get();

        $absentFine = AbsentFine::where('class_id', $session->class_id)->first();

        $total_fee = Fee::where('section_id', $session->section_id)
            ->where('class_id', $session->class_id)
            ->with('feeHead')
            ->sum('fee_amount');

        $total_fine = Fee::where('section_id', $session->section_id)
            ->where('class_id', $session->class_id)
            ->with('feeHead')
            ->sum('fine_amount');

        $feeHeads = [];
        foreach ($amountConfig as $config) {
            $feeHeads[] = $config->feeHead;
            $feeHeads = array_unique($feeHeads);
        }

        // Check the fee subheads if already added and remove them from the feeHeads array.
        foreach ($feeHeads as $key => $feeHead) {
            $feeSubHeads = $feeHead->feeSubHeads;
            $updatedFeeSubHeads = [];

            foreach ($feeSubHeads as $feeSubHead) {
                $studentCollectionDetailsSubHead = StudentCollectionDetailsSubHead::where('student_id', $id)
                    ->where('session_id', $session->session_id)
                    ->where('fee_head_id', $feeHead->id)
                    ->where('sub_head_id', $feeSubHead->id)
                    ->first();

                if (!$studentCollectionDetailsSubHead || $studentCollectionDetailsSubHead->collectionDetail->total_paid === 0) {
                    array_push(
                        $updatedFeeSubHeads,
                        $feeSubHead
                    );
                }
            }

            $feeHeads[$key]->feeSubHeads = $updatedFeeSubHeads;
        }
        // dd($absentFine->fee_amount);
        return view('backend.quick_collection.show', [
            'studentSession' => $this->studentSessionService->findStudentSessionById($id),
            'feeHeads' => $feeHeads,
            'total_fee' => $total_fee,
            'total_fine' => $total_fine,
            'attendence' => $attendance,
            'absentFine' => $absentFine
        ]);
    }

    public function invoice($id)
    {
        $studentCollection = StudentCollection::where('id', $id)->first();
        return view('backend.quick_collection.invoice-pdf', compact('studentCollection'));
    }

    public function getCollectionAmounts(Request $request)
    {
        $studentId = $request->input('student_id');
        $feeHeadId = $request->input('fee_head_id');
        $feeSubHeadIds = (array) $request->input('fee_sub_head_ids');
        return response()->json(
            $this->getCollectionAmountsByFeeHeadAndSubHeads(
                $studentId,
                $feeHeadId,
                $feeSubHeadIds
            )
        );
    }
}
