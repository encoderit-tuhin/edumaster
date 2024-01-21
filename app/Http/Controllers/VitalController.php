<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Vital;
use Exception;
use App\Student;
use App\Subject;
use App\PreviousExam;
use App\PreviousInstitute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\StudentAdditionInformation;
use Intervention\Image\Facades\Image;
use App\Services\StudentSessionService;
use App\StudentOnlineRegistration;
use App\StudentSession;
use Dompdf\Dompdf;
use Dompdf\Options;

class VitalController extends Controller
{
    public function __construct(
        // private readonly UserService $userService,
        // private readonly ClassService $classService,
        // private readonly SectionService $sectionService,
        // private readonly StudentService $studentService,
        private readonly StudentSessionService $studentSessionService,
        // private readonly StudentOnlineRegistrationService $studentOnlineRegistrationService
    ) {
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vital $vital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($student_id)
    {
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('previous_institutes', 'previous_institutes.student_id', '=', 'students.id')
            ->leftJoin('previous_exams', 'previous_exams.student_id', '=', 'students.id')
            ->leftJoin('parents', 'parents.id', '=', 'students.parent_id')
            ->leftJoin('student_addition_information', 'student_addition_information.student_id', '=', 'students.id')

            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('students.id', $student_id)
            ->with('studentGroup', 'studentSession')
            ->select('*', 'students.id as studentId')
            ->first();

        if (!$student) {
            return back()->with('error', "Student Application Not Found");
        }

        $exams = DB::select("SELECT marks.exam_id,marks.class_id,marks.section_id,marks.subject_id, exams.name 
    FROM marks,exams WHERE marks.exam_id=exams.id AND marks.student_id=:student_id
    AND marks.class_id=:class GROUP BY marks.exam_id", ["student_id" => $student_id, "class" => $student->class_id]);

        $subjects = Subject::where("class_id", $student->class_id)->get();

        $existing_marks = DB::select("SELECT marks.subject_id, marks.exam_id,mark_details.* from mark_details,marks WHERE mark_details.mark_id=marks.id 
    AND marks.class_id=:class AND marks.student_id=:student", ["class" => $student->class_id, "student" => $student_id]);


        $mark_head = DB::select("SELECT distinct mark_details.mark_type from mark_distributions 
    JOIN mark_details JOIN marks ON mark_details.mark_type = mark_distributions.mark_distribution_type 
    AND mark_details.mark_id=marks.id WHERE 
    marks.class_id=:class AND marks.student_id=:student", ["class" => $student->class_id, "student" => $student_id]);

        $mark_details = [];

        foreach ($existing_marks as $key => $val) {
            if ($val->mark_id != "") {
                $mark_details[$val->subject_id][$val->exam_id][$val->mark_type] = $val;
            }
        }

        $studentSession = StudentSession::where('student_id', $student_id)->first();
        $stOnline = StudentOnlineRegistration::where('student_id', $student_id)->first();

        // Update base64 image.
        try {
            $stOnline->base64 = base64_encode(file_get_contents(public_path('/uploads/images/' . $stOnline->image)));
        } catch (\Throwable $th) {
            $stOnline->base64 = null;
        }

        try {
            $stOnline->logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        } catch (\Throwable $th) {
            $stOnline->logo = null;
        }

        return view('backend.vital.print', compact('student', 'stOnline', 'studentSession', 'exams', 'mark_head', 'mark_details', 'subjects'));

        // TODO: Remove this after a certail amount of time, if we confirm,
        // that the new pdf is working fine.

        // $options = new Options();
        // $options->set('defaultFont', 'Sans-serif');
        // $options->setTempDir('temp');

        // $dompdf = new Dompdf();

        // $dompdf->setHttpContext(
        //     stream_context_create([
        //         'ssl' => [
        //             'allow_self_signed'=> true,
        //             'verify_peer' => false,
        //             'verify_peer_name' => false,
        //         ]
        //     ])
        // );
        // $dompdf->setOptions($options);

        // instantiate and use the dompdf class
        // $html = view('backend.vital.print', compact('student', 'stOnline', 'studentSession', 'exams', 'mark_head', 'mark_details', 'subjects'));
        // $dompdf->loadHtml($html, 'UTF-8');
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        // $dompdf->stream(
        //     'Vital-' . $student->id . '.pdf',
        //     [
        //         'Attachment' => false
        //     ]
        // );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $studentId)
    {
        try {
            DB::beginTransaction();
            PreviousExam::updateOrCreate(
                ['student_id' => $studentId],
                [
                    'exam_name' => "ssc",
                    'ssc_group' => $request->ssc_group,
                    'ssc_board' => $request->ssc_board,
                    'ssc_roll_no' => $request->ssc_roll_no,
                    'ssc_registration' => $request->ssc_registration,
                    'ssc_session' => $request->ssc_passing_year,
                    'ssc_grade' => $request->ssc_grade,
                    'ssc_point' => $request->gpa_without_4th,
                    'nick_name' => $request->nick_name,
                    'school_name' => $request->school_name,
                    'school_address' => $request->school_address,
                    'center' => $request->center,
                    'ssc_passing_year' => $request->ssc_passing_year,
                    'bangla' => $request->bangla,
                    'english' => $request->english,
                    'math' => $request->math,
                    'higher_math' => $request->higher_math ?? null,
                    // If this field is nullable
                    'gpa_with_4th' => $request->gpa_with_4th,
                    'gpa_without_4th' => $request->gpa_without_4th,
                    'total_a_plus' => $request->total_a_plus,
                    'grade_4th_sub' => $request->grade_4th_sub,
                    'hsc_result_roll_no' => $request->hsc_result_roll_no,
                    'hsc_result_year' => $request->hsc_result_year,
                    'hsc_result_reg_no' => $request->hsc_result_reg_no,
                    'hsc_result_session' => $request->hsc_result_session,
                    'hsc_result_gpa' => $request->hsc_result_gpa,
                    'hsc_result_num_of_a_plus' => $request->hsc_result_num_of_a_plus,
                    'hsc_result_total_appeared' => $request->hsc_result_total_appeared,
                    'hsc_result_total_passed' => $request->hsc_result_total_passed,
                    'hsc_result_percentage' => $request->hsc_result_percentage,
                    'hsc_result_total_examinees_combined' => $request->hsc_result_total_examinees_combined,
                    'hsc_result_subjects_a_plus' => $request->hsc_result_subjects_a_plus,
                    'ssc_chemistry' => $request->chemistry,
                    'ssc_biology' => $request->biology,
                    'ssc_higherMath' => $request->higherMath,
                    'ssc_bangladeshWorld' => $request->bangladeshWorld,
                    'ssc_agricultureStudies' => $request->agricultureStudies,
                    'ssc_homeScience' => $request->homeScience,
                    'ssc_other' => $request->other,
                    'ssc_financeBanking' => $request->financeBanking,
                    'ssc_accounting' => $request->accounting,
                    'ssc_businessEnt' => $request->businessEnt,
                    'ssc_generalScience' => $request->generalScience,
                    'ssc_music' => $request->music,
                    'ssc_geography' => $request->geography,
                    'ssc_civicCitizenship' => $request->civicCitizenship,
                    'ssc_economics' => $request->economics,
                    'ssc_historyBangladesh' => $request->historyBangladesh,
                    'religion' => $request->religion,
                    'section' => $request->section,
                    'ethinic' => $request->ethinic,
                    'bk' => $request->bk,
                    'subject_grade' => $request->subject_grade,
                    'application_no' => $request->application_no,
                    'date_of_admission' => $request->date_of_admission,
                    'serial_no' => $request->serial_no,
                    'place' => $request->place,
                    'remarks_data' => $request->remarks_data,
                ]
            );
            PreviousInstitute::updateOrCreate([
                'student_id' => $studentId
            ], [
                'institute_address' => $request->institute_address,
                'last_education' => $request->school_address,
                'institute_name' => $request->institute_name,
                'institute_no' => $request->institute_no,
                'institute_mobile' => $request->institute_mobile,
                'institute_phone' => $request->institute_phone,
                'institute_email' => $request->institute_email,
                'time_period' => $request->time_period,

            ]);


            StudentAdditionInformation::updateOrCreate([
                'student_id' => $studentId
            ], [
                'bangla_name' => $request->bangla_name,
                'father_designation' => $request->father_designation,
                'father_nid' => $request->father_nid,
                'mother_phone' => $request->mother_phone,
                'mother_nid' => $request->mother_nid,
                'mother_designation' => $request->mother_designation,
                'father_office_address' => $request->father_office_address,
                'mother_office_address' => $request->mother_office_address,
                'permanent_address' => $request->permanent_address,
                'present_address' => $request->present_address,
                'permanent_address_phone' => $request->present_address_phone,
                'present_address_phone' => $request->present_address_phone,
                'monthly_income_parents' => $request->monthly_income_parents,
                'monthly_income_family' => $request->monthly_income_family,
                'permanent_district' => $request->permanent_district,
                'post_office' => $request->post_office,
                'police_station' => $request->police_station,
                'progress_report_sent_to_relation' => $request->progress_report_sent_to_relation,
                'progress_report_sent_to_name' => $request->progress_report_sent_to_name,
                'progress_report_sent_to_phone' => $request->progress_report_sent_to_phone,
                'progress_report_sent_to_address' => $request->progress_report_sent_to_address,
                'local_guardian_name' => $request->local_guardian_name,
                'local_guardian_relationship' => $request->local_guardian_relationship,
                'local_guardian_nid' => $request->local_guardian_nid,
                'local_guardian_profession' => $request->local_guardian_profession,
                'local_guardian_phone' => $request->local_guardian_phone,
                'local_guardian_office_address' => $request->local_guardian_office_address,
                'local_guardian_occupation' => $request->local_guardian_occupation,
                'local_guardian_office_phone' => $request->local_guardian_office_phone,
                'local_guardian_designation' => $request->local_guardian_designation,
                'local_guardian_address' => $request->local_guardian_address,

            ]);

            $student = Student::where('id', $studentId)->first();
            $user = User::where('id', $student->user_id)->first();

            if (isset($request->image)) {
                $image = $request->image;
                $ImageName = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(200, 160)->save(base_path('public/uploads/images/students/') . $ImageName);
                $image = 'students/' . $ImageName;
                $user->image = $image;
                $user->save();
            }

            DB::commit();
            return back()->with('success', "updated");
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', "error");
        }
    }

    public function destroy(Vital $vital)
    {
        //
    }
    public function vitalPdf($id)
    {
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->join('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('previous_institutes', 'previous_institutes.student_id', '=', 'students.id')
            ->leftJoin('previous_exams', 'previous_exams.student_id', '=', 'students.id')
            ->leftJoin('parents', 'parents.id', '=', 'students.parent_id')
            ->leftJoin('student_addition_information', 'student_addition_information.student_id', '=', 'students.id')

            ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('students.id', 3)
            ->with('studentGroup', 'studentSession')
            ->select('*', 'students.id as studentId')
            ->first();
        $data = [
            'student' => $student,
        ];

        $pdf = PDF::loadView('backend.vital.edit', $data);
        return $pdf->download('sdsds.pdf');
    }
    public function printVital()
    {
        return view('backend.vital.print');
        $pdf = PDF::loadView('backend.vital.print');
        return $pdf->download('sdsds.pdf');
    }
}
