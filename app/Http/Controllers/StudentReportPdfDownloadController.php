<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\SmsLog;
use App\Section;
use App\Student;
use App\ClassModel;
use App\StudentMigration;
use Illuminate\Http\Request;
use App\Services\ClassService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use App\Services\StudentOnlineRegistrationService;

class StudentReportPdfDownloadController extends Controller
{
    public function __construct(
        private readonly ClassService $classService,
        private readonly StudentService $studentService,
        private readonly StudentOnlineRegistrationService $studentOnlineRegistrationService
    ) {
    }

    public function studentSummaryReportPdfDownload(Request $request)
    {
        $formType = $request->form_type;
        $academicYearId = (int) $request->academic_year_id;
        $type = $request->type;
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));

        $classWiseData = NULL;
        $totalClassCount = NULL;
        $sectionWiseData = NULL;
        $totalSectionCount = NULL;
        $totalStudentCount = NULL;
        $genderClassWiseData = NULL;
        $totalGenderClassCount = NULL;
        $totalGenderStudentCount = NULL;
        $genderSectionWiseData = NULL;
        $totalGenderSectionCount = NULL;
        $totalGenderSectionStudentCount = NULL;
        $totalGenderMaleStudent = NULL;
        $totalGenderFemaleStudent = NULL;
        $totalGenderSectionMaleStudent = NULL;
        $totalGenderSectionFemaleStudent = NULL;

        $religionClassWiseData = NULL;
        $totalReligionClassCount = NULL;
        $totalReligionStudentCount = NULL;
        $totalReligionIslamStudents = NULL;
        $totalReligionChristianStudents = NULL;
        $totalReligionHinduStudents = NULL;
        $totalReligionBuddhismStudents = NULL;
        $religionSectionWiseData = NULL;
        $totalReligionSectionCount = NULL;
        $totalReligionSectionStudentCount = NULL;
        $totalReligionIslamStudentsSectionCount = NULL;
        $totalReligionChristianStudentsSectionCount = NULL;
        $totalReligionHinduStudentsSectionCount = NULL;
        $totalReligionBuddhismStudentsSectionCount = NULL;
        $totalReligionOthersStudents = NULL;
        $totalReligionOthersStudentsSectionCount = NULL;

        if ($formType === 'total_students') {
            if ($type === 'class_wise') {
                $classIds = ClassModel::pluck('id'); // Fetch all class IDs

                $classWiseData = Student::query()
                    ->select(
                        'classes.class_name',
                        DB::raw('COUNT(students.id) as total_students')
                    )
                    ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                    ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                    ->whereIn('student_sessions.class_id', $classIds)
                    ->where('student_sessions.session_id', $academicYearId)
                    ->groupBy('classes.id', 'classes.class_name')
                    ->get();

                $totalClassCount = $classWiseData->count();
                $totalStudentCount = $classWiseData->sum('total_students');

                $pdf = PDF::loadView('backend.students.student_reports.summary.summary_reports.total_students-class-wise-pdf', compact(
                    'classWiseData',
                    'type',
                    'academicYearId',
                    'totalClassCount',
                    'totalStudentCount',
                    'logo'
                ));

                return $pdf->download('class_wise.pdf');
            }

            if ($type === 'section_wise') {
                $sectionIds = Section::pluck('id'); // Fetch all section IDs

                $sectionWiseData = Student::query()
                    ->select(
                        'sections.section_name',
                        'classes.class_name',
                        DB::raw('COUNT(students.id) as total_students')
                    )
                    ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                    ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                    ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                    ->whereIn('student_sessions.section_id', $sectionIds)
                    ->where('student_sessions.session_id', $academicYearId)
                    ->groupBy('sections.id', 'sections.section_name')
                    ->get();

                $totalSectionCount = $sectionWiseData->count();
                $totalStudentCount = $sectionWiseData->sum('total_students');

                $pdf = PDF::loadView('backend.students.student_reports.summary.summary_reports.total_students-section-wise-pdf', compact(
                    'sectionWiseData',
                    'type',
                    'academicYearId',
                    'totalSectionCount',
                    'totalStudentCount',
                    'logo'
                ));

                return $pdf->download('section_wise.pdf');
            }
        }

        if ($formType === 'gender_info') {
            if ($type === 'class_wise') {
                $classIds = ClassModel::pluck('id'); // Fetch all class IDs

                $genderClassWiseData = Student::query()
                    ->select(
                        'classes.class_name',
                        DB::raw('COUNT(students.id) as total_students'),
                        DB::raw('SUM(CASE WHEN students.gender = "Male" THEN 1 ELSE 0 END) as male_students'),
                        DB::raw('SUM(CASE WHEN students.gender = "Female" THEN 1 ELSE 0 END) as female_students')
                    )
                    ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                    ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                    ->whereIn('student_sessions.class_id', $classIds)
                    ->where('student_sessions.session_id', $academicYearId)
                    ->groupBy('classes.id', 'classes.class_name')
                    ->get();

                $totalGenderClassCount = $genderClassWiseData->count();
                $totalGenderStudentCount = $genderClassWiseData->sum('total_students');
                $totalGenderMaleStudent = $genderClassWiseData->sum('male_students');
                $totalGenderFemaleStudent = $genderClassWiseData->sum('female_students');

                $pdf = PDF::loadView('backend.students.student_reports.summary.summary_reports.gender_info_class_wise_pdf', compact(
                    'logo',
                    'type',
                    'academicYearId',
                    'genderClassWiseData',
                    'totalGenderClassCount',
                    'totalGenderStudentCount',
                    'totalGenderMaleStudent',
                    'totalGenderFemaleStudent',
                ));

                return $pdf->download('gender_class_wise.pdf');
            }

            if ($type === 'section_wise') {
                $sectionIds = Section::pluck('id'); // Fetch all section IDs

                $genderSectionWiseData = Student::query()
                    ->select(
                        'sections.section_name',
                        'classes.class_name',
                        DB::raw('COUNT(students.id) as total_students'),
                        DB::raw('SUM(CASE WHEN students.gender = "Male" THEN 1 ELSE 0 END) as male_students'),
                        DB::raw('SUM(CASE WHEN students.gender = "Female" THEN 1 ELSE 0 END) as female_students')
                    )
                    ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                    ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                    ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                    ->whereIn('student_sessions.section_id', $sectionIds)
                    ->where('student_sessions.session_id', $academicYearId)
                    ->groupBy('sections.id', 'sections.section_name')
                    ->get();

                $totalGenderSectionCount = $genderSectionWiseData->count();
                $totalGenderSectionStudentCount = $genderSectionWiseData->sum('total_students');
                $totalGenderSectionMaleStudent = $genderSectionWiseData->sum('male_students');
                $totalGenderSectionFemaleStudent = $genderSectionWiseData->sum('female_students');

                $pdf = PDF::loadView('backend.students.student_reports.summary.summary_reports.gender_info_section_wise_pdf', compact(
                    'logo',
                    'type',
                    'academicYearId',
                    'genderSectionWiseData',
                    'totalGenderSectionCount',
                    'totalGenderSectionStudentCount',
                    'totalGenderSectionMaleStudent',
                    'totalGenderSectionFemaleStudent',
                ));

                return $pdf->download('gender_section_wise.pdf');
            }
        }

        if ($formType === 'religion_info') {
            if ($type === 'class_wise') {
                $classIds = ClassModel::pluck('id'); // Fetch all class IDs

                $religionClassWiseData = Student::query()
                    ->select(
                        'classes.class_name',
                        DB::raw('COUNT(students.id) as total_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Islam" THEN 1 ELSE 0 END) as islam_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Christianity" THEN 1 ELSE 0 END) as christian_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Hinduism" THEN 1 ELSE 0 END) as hindu_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Buddhism" THEN 1 ELSE 0 END) as buddhism_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Others" THEN 1 ELSE 0 END) as others_religions')
                    )
                    ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                    ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                    ->whereIn('student_sessions.class_id', $classIds)
                    ->where('student_sessions.session_id', $academicYearId)
                    ->groupBy('classes.id', 'classes.class_name')
                    ->get();

                $totalReligionClassCount = $religionClassWiseData->count();
                $totalReligionStudentCount = $religionClassWiseData->sum('total_religions');
                $totalReligionIslamStudents = $religionClassWiseData->sum('islam_religions');
                $totalReligionChristianStudents = $religionClassWiseData->sum('christian_religions');
                $totalReligionHinduStudents = $religionClassWiseData->sum('hindu_religions');
                $totalReligionBuddhismStudents = $religionClassWiseData->sum('buddhism_religions');
                $totalReligionOthersStudents = $religionClassWiseData->sum('others_religions');

                $pdf = PDF::loadView('backend.students.student_reports.summary.summary_reports.religion_info_class_wise_pdf', compact(
                    'logo',
                    'type',
                    'academicYearId',
                    'religionClassWiseData',
                    'totalReligionClassCount',
                    'totalReligionStudentCount',
                    'totalReligionIslamStudents',
                    'totalReligionChristianStudents',
                    'totalReligionHinduStudents',
                    'totalReligionBuddhismStudents',
                    'totalReligionOthersStudents',
                ));

                return $pdf->download('religion_class_wise.pdf');
            }

            if ($type === 'section_wise') {
                $sectionIds = Section::pluck('id'); // Fetch all section IDs

                $religionSectionWiseData = Student::query()
                    ->select(
                        'classes.class_name',
                        'sections.section_name',
                        DB::raw('COUNT(students.id) as total_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Islam" THEN 1 ELSE 0 END) as islam_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Christianity" THEN 1 ELSE 0 END) as christian_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Hinduism" THEN 1 ELSE 0 END) as hindu_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Buddhism" THEN 1 ELSE 0 END) as buddhism_religions'),
                        DB::raw('SUM(CASE WHEN students.religion = "Others" THEN 1 ELSE 0 END) as others_religions')
                    )
                    ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                    ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                    ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                    ->whereIn('student_sessions.section_id', $sectionIds)
                    ->where('student_sessions.session_id', $academicYearId)
                    ->groupBy('sections.id', 'sections.section_name')
                    ->get();

                $totalReligionSectionCount = $religionSectionWiseData->count();
                $totalReligionSectionStudentCount = $religionSectionWiseData->sum('total_religions');
                $totalReligionIslamStudentsSectionCount = $religionSectionWiseData->sum('islam_religions');
                $totalReligionChristianStudentsSectionCount = $religionSectionWiseData->sum('christian_religions');
                $totalReligionHinduStudentsSectionCount = $religionSectionWiseData->sum('hindu_religions');
                $totalReligionBuddhismStudentsSectionCount = $religionSectionWiseData->sum('buddhism_religions');
                $totalReligionOthersStudentsSectionCount = $religionSectionWiseData->sum('others_religions');

                $pdf = PDF::loadView('backend.students.student_reports.summary.summary_reports.religion_info_section_wise_pdf', compact(
                    'logo',
                    'type',
                    'academicYearId',
                    'religionSectionWiseData',
                    'totalReligionSectionCount',
                    'totalReligionSectionStudentCount',
                    'totalReligionIslamStudentsSectionCount',
                    'totalReligionChristianStudentsSectionCount',
                    'totalReligionHinduStudentsSectionCount',
                    'totalReligionBuddhismStudentsSectionCount',
                    'totalReligionOthersStudentsSectionCount',
                ));

                return $pdf->download('religion_section_wise.pdf');
            }
        }
    }

    public function studentPdfDownload()
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        $class_id = (int) request()->class_id;
        $section_id = (int) request()->section_id;
        $group_id = (int) request()->group_id;

        $students = $this->studentService->getStudentsByClassSectionGroup($class_id, $section_id, $group_id);

        $pdf = PDF::loadView('backend.students.student_list_reports_pdf', compact(
            'logo',
            'students',
        ));

        return $pdf->download('student-list.pdf');
    }

    public function detailsStudentListPdf(Request $request)
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        $formType = $request->form_type;
        $classId = NULL;
        $sectionId = NULL;
        $groupId = NULL;
        $categoryId = NULL;
        $academicYearId = NULL;
        $type = NULL;

        $classWiseStudents = NULL;
        $sectionWiseStudents = NULL;
        $sectionGroupWiseStudents = NULL;
        $categoryWiseStudents = NULL;
        $sectionCategoryWiseStudents = NULL;
        $sectionAgeWiseStudents = Null;
        $genderWiseStudents = NULL;
        $totalSectionStudentGenderCount = NULL;


        if ($formType === 'class_wise') {
            $classId = $request->class_id;

            $classWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_sessions.*',
                    'student_groups.group_name'
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
                ->where('student_sessions.class_id', $classId)
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.class_wise_pdf', compact(
                'logo',
                'classId',
                'classWiseStudents',
            ));

            return $pdf->download('Class_wise_students.pdf');
        }

        if ($formType === 'section_wise') {
            $sectionId = $request->section_id;

            $sectionWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_sessions.*',
                    'student_groups.group_name',
                    'student_categories.name as category_name',
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                ->leftJoin('student_categories', 'student_categories.id', '=', 'students.student_category_id')
                ->where('student_sessions.section_id', $sectionId)
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.section_wise_pdf', compact(
                'logo',
                'sectionId',
                'sectionWiseStudents',
            ));

            return $pdf->download('Section_wise_students.pdf');
        }

        if ($formType === 'section_group_wise') {
            $sectionId = $request->section_id;
            $groupId = $request->group_id;

            $sectionGroupWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_sessions.*',
                    'student_groups.group_name',
                    'student_categories.name as category_name',
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                ->leftJoin('student_categories', 'student_categories.id', '=', 'students.student_category_id')
                ->where('student_sessions.section_id', $sectionId)
                ->where('students.group', $groupId)
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.group_wise_pdf', compact(
                'logo',
                'sectionId',
                'groupId',
                'sectionGroupWiseStudents',
            ));

            return $pdf->download('Section_group_wise_students.pdf');
        }

        if ($formType === 'category_wise') {
            $categoryId = intval($request->category_id);

            $categoryWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_groups.group_name'
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->where('students.student_category_id', $categoryId)
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.category_wise_pdf', compact(
                'logo',
                'categoryId',
                'categoryWiseStudents',
            ));

            return $pdf->download('Category_wise_students.pdf');
        }

        if ($formType === 'section_category_wise') {
            $sectionId = $request->section_id;
            $categoryId = $request->category_id;

            $sectionCategoryWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_groups.group_name',
                    'student_sessions.roll',
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->where('student_sessions.section_id', $sectionId)
                ->where('students.student_category_id', $categoryId)
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.section_category_wise_pdf', compact(
                'logo',
                'sectionId',
                'categoryId',
                'sectionCategoryWiseStudents',
            ));

            return $pdf->download('Section_Category_wise_students.pdf');
        }

        if ($formType === 'age_wise') {
            $sectionId = $request->section_id;

            $sectionAgeWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_sessions.*',
                    'student_groups.group_name',
                    'student_categories.name as category_name',
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                ->leftJoin('student_categories', 'student_categories.id', '=', 'students.student_category_id')
                ->where('student_sessions.section_id', $sectionId)
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.age_wise_pdf', compact(
                'logo',
                'sectionId',
                'sectionAgeWiseStudents'
            ));

            return $pdf->download('Section_Age_wise_students.pdf');
        }

        if ($formType === 'gender_wise') {
            $sectionIds = Section::pluck('id');
            $academicYearId = $request->academic_year_id;
            $type = $request->type;

            $genderWiseStudents = Student::query()
                ->select(
                    'sections.section_name',
                    DB::raw('COUNT(students.id) as total_students')
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
                ->whereIn('student_sessions.section_id', $sectionIds)
                ->where('student_sessions.session_id', $academicYearId)
                ->where('students.gender', $type)
                ->groupBy('sections.id', 'sections.section_name')
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.details.details_reports_pdf.gender_wise_pdf', compact(
                'logo',
                'academicYearId',
                'type',
                'genderWiseStudents'
            ));

            return $pdf->download('Gender_wise_students.pdf');
        }
    }

    public function atAGlancePdf()
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));

        $students = Student::query()
            ->select('students.*', 'student_sessions.roll', 'classes.class_name', 'sections.section_name', 'student_groups.group_name')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->leftJoin('student_groups', 'students.group', '=', 'student_groups.id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->orderBy('classes.class_name', 'ASC')->get();

        $pdf = PDF::loadView('backend.students.student_reports.at_a_glance.index_pdf', compact(
            'students',
            'logo'
        ));

        return $pdf->download('Student Lists.pdf');
    }

    public function quickSearchPdf(Request $request)
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        $sectionId = (int) $request->section_id;
        $academicYearId = (int) $request->academic_year_id;

        $sectionWiseStudents = Student::query()
            ->select(
                'students.*',
                'student_sessions.*',
                'student_groups.group_name',
                'student_categories.name as category_name',
            )
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('student_groups', 'students.group', 'student_groups.id')
            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->leftJoin('student_categories', 'student_categories.id', '=', 'students.student_category_id')
            ->where('student_sessions.section_id', $sectionId)
            ->where('student_sessions.session_id', $academicYearId)
            ->get();

        $pdf = PDF::loadView('backend.students.student_reports.quick_search.index_pdf', compact(
            'logo',
            'sectionId',
            'academicYearId',
            'sectionWiseStudents',
        ));

        return $pdf->download('Quick Student Lists.pdf');
    }

    public function studentIdPassPdfDownload()
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        $class_id = (int) request()->class_id;
        $section_id = (int) request()->section_id;
        $group_id = (int) request()->group_id;

        $students = $this->studentService->getStudentsByClassSectionGroup($class_id, $section_id, $group_id);

        $pdf = PDF::loadView('backend.students.send_id_pass.index_pdf', compact(
            'logo',
            'students',
        ));

        return $pdf->download('Student Id Pass List.pdf');
    }

    public function applyingStudents()
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        $students = $this->studentOnlineRegistrationService->getStudentOnlineRegistrations();

        $pdf = PDF::loadView('backend.students.onlineRegistration.index_pdf', compact(
            'logo',
            'students',
        ));

        return $pdf->download('Applying students.pdf');
    }

    public function sendSmsPdfReports(Request $request)
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));
        $userTypes = User::select('user_type')->groupBy('user_type')->get()->pluck('user_type')->toArray();
        $userTypes[] = 'Individual';
        $smsReports = SmsLog::latest();
        $fromDate = $request->from;
        $toDate = $request->to;
        $type = $request->user_type;

        if ($request->filled('from') && $request->filled('to') && $request->filled('user_type')) {
            $smsReports->whereBetween('created_at', [date($fromDate), date($toDate)])
                ->where('user_type', $type);
        }

        $smsReports = $smsReports->with('user')->get();

        $pdf = PDF::loadView('backend.sms.report.send_pdf', compact(
            'logo',
            'smsReports',
            'userTypes',
            'fromDate',
            'toDate',
            'type',
        ));

        return $pdf->download('SMS Reports.pdf');
    }

    public function migratedListPdfDownload(Request $request)
    {
        $logo = base64_encode(file_get_contents(public_path('/' . get_logo_file_path())));

        if ($request->section_id == 'all') {
            $sectionId = $request->section_id ?? NULL;
            $academicYearId = $request->academic_year_id ?? NULL;
            $migratedLists = StudentMigration::join('students', 'student_migrations.student_id', '=', 'students.id')
                ->join('sections', 'student_migrations.section_id', '=', 'sections.id')
                ->select(
                    'student_migrations.student_id as studentID',
                    'student_migrations.new_roll as student_roll',
                    'students.first_name as student_first_name',
                    'students.last_name as student_last_name',
                    'students.gender as student_gender',
                    'sections.section_name as student_section_name'
                )
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.migrated_list.migration_pdf', compact(
                'logo',
                'sectionId',
                'academicYearId',
                'migratedLists',
            ));

            return $pdf->download('Student Migration List.pdf');
        } else {
            $sectionId = $request->section_id ?? NULL;
            $academicYearId = $request->academic_year_id ?? NULL;
            $migratedLists = StudentMigration::join('students', 'student_migrations.student_id', '=', 'students.id')
                ->join('sections', 'student_migrations.section_id', '=', 'sections.id')
                ->where('student_migrations.section_id', $sectionId)
                ->where('student_migrations.academic_year', $academicYearId)
                ->select(
                    'student_migrations.student_id as studentID',
                    'student_migrations.new_roll as student_roll',
                    'students.first_name as student_first_name',
                    'students.last_name as student_last_name',
                    'students.gender as student_gender',
                    'sections.section_name as student_section_name'
                )
                ->get();

            $pdf = PDF::loadView('backend.students.student_reports.migrated_list.migration_pdf', compact(
                'logo',
                'sectionId',
                'academicYearId',
                'migratedLists',
            ));

            return $pdf->download('Student Migration List.pdf');
        }
    }
}
