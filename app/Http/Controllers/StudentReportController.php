<?php

namespace App\Http\Controllers;

use PDF;
use App\Section;
use App\Student;
use App\Subject;
use App\Assignment;
use App\ClassModel;
use App\ClassRoutine;
use App\StudentSession;
use App\StudentMigration;
use Illuminate\Http\Request;
use App\Services\ClassService;
use Illuminate\Support\Facades\DB;

class StudentReportController extends Controller
{
    public function __construct(private readonly ClassService $classService)
    {
    }

    public function studentList(Request $request)
    {
        $formType = $request->form_type; // total_students
        $type = $request->type; // class_wise & section_wise
        $academicYearId = (int) $request->academic_year_id;

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
            }
        }
        if ($request->method() == "GET") {
            return view('backend.students.student_reports.summary.index', compact(
                'classWiseData',
                'type',
                'academicYearId',
                'totalClassCount',
                'totalStudentCount',
                'sectionWiseData',
                'totalSectionCount',
                'genderClassWiseData',
                'totalGenderClassCount',
                'totalGenderStudentCount',
                'genderSectionWiseData',
                'totalGenderSectionCount',
                'totalGenderSectionStudentCount',
                'totalGenderMaleStudent',
                'totalGenderFemaleStudent',
                'totalGenderSectionMaleStudent',
                'totalGenderSectionFemaleStudent',
                'religionClassWiseData',
                'totalReligionClassCount',
                'totalReligionStudentCount',
                'totalReligionIslamStudents',
                'totalReligionChristianStudents',
                'totalReligionHinduStudents',
                'totalReligionBuddhismStudents',
                'religionSectionWiseData',
                'totalReligionSectionCount',
                'totalReligionSectionStudentCount',
                'totalReligionIslamStudentsSectionCount',
                'totalReligionChristianStudentsSectionCount',
                'totalReligionHinduStudentsSectionCount',
                'totalReligionBuddhismStudentsSectionCount',
                'totalReligionOthersStudents',
                'totalReligionOthersStudentsSectionCount',
            ));
        }
        if ($request->method() == "POST") {
            return view(
                'backend.students.student_reports.new-pdf.summary',
                compact(
                    'classWiseData',
                    'type',
                    'academicYearId',
                    'totalClassCount',
                    'totalStudentCount',
                    'sectionWiseData',
                    'totalSectionCount',
                    'genderClassWiseData',
                    'totalGenderClassCount',
                    'totalGenderStudentCount',
                    'genderSectionWiseData',
                    'totalGenderSectionCount',
                    'totalGenderSectionStudentCount',
                    'totalGenderMaleStudent',
                    'totalGenderFemaleStudent',
                    'totalGenderSectionMaleStudent',
                    'totalGenderSectionFemaleStudent',
                    'religionClassWiseData',
                    'totalReligionClassCount',
                    'totalReligionStudentCount',
                    'totalReligionIslamStudents',
                    'totalReligionChristianStudents',
                    'totalReligionHinduStudents',
                    'totalReligionBuddhismStudents',
                    'religionSectionWiseData',
                    'totalReligionSectionCount',
                    'totalReligionSectionStudentCount',
                    'totalReligionIslamStudentsSectionCount',
                    'totalReligionChristianStudentsSectionCount',
                    'totalReligionHinduStudentsSectionCount',
                    'totalReligionBuddhismStudentsSectionCount',
                    'totalReligionOthersStudents',
                    'totalReligionOthersStudentsSectionCount',
                )
            );
        }
    }

    public function detailsStudentList(Request $request)
    {
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
        }

        if ($formType === 'category_wise') {
            $categoryId = intval($request->category_id);

            $categoryWiseStudents = Student::query()
                ->select(
                    'students.*',
                    'student_groups.group_name',
                    'student_sessions.roll',
                )
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->leftJoin('student_groups', 'students.group', 'student_groups.id')
                ->where('students.student_category_id', $categoryId)
                ->get();
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

            $totalSectionStudentGenderCount = $genderWiseStudents->sum('total_students');
        }
        if ($request->method() == "GET") {
            return view('backend.students.student_reports.details.index', [
                'formType' => $formType,
                'classId' => $classId,
                'sectionId' => $sectionId,
                'groupId' => $groupId,
                'categoryId' => $categoryId,
                'academicYearId' => $academicYearId,
                'type' => $type
            ]);
        } elseif ($request->method() == "POST") {
            return view('backend.students.student_reports.new-pdf.index', [
                'formType' => $formType,
                'classId' => $classId,
                'sectionId' => $sectionId,
                'groupId' => $groupId,
                'categoryId' => $categoryId,
                'academicYearId' => $academicYearId,
                'type' => $type,
                'classWiseStudents' => $classWiseStudents,
                'sectionWiseStudents' => $sectionWiseStudents,
                'sectionGroupWiseStudents' => $sectionGroupWiseStudents,
                'categoryWiseStudents' => $categoryWiseStudents,
                'sectionCategoryWiseStudents' => $sectionCategoryWiseStudents,
                'sectionAgeWiseStudents' => $sectionAgeWiseStudents,
                'genderWiseStudents' => $genderWiseStudents,
                'totalSectionStudentGenderCount' => $totalSectionStudentGenderCount,
            ]);
        } else {
            return back();
        }
    }

    public function atAGlance()
    {
        $students = Student::query()
            ->select('students.*', 'student_sessions.roll', 'classes.class_name', 'sections.section_name', 'student_groups.group_name')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->leftJoin('student_groups', 'students.group', '=', 'student_groups.id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->orderBy('classes.class_name', 'ASC')->get();

        return view('backend.students.student_reports.at_a_glance.index', [
            'students' => $students
        ]);
    }

    public function taughtList(Request $request)
    {
        $classId = $request->class_id ?? NULL;
        $groupId = $request->group_id ?? NULL;
        $examId = $request->exam_id ?? NULL;
        $academicYearId = $request->academic_year_id ?? NULL;

        // TODO

        return view('backend.students.student_reports.taught_list.index', [
            'classId' => $classId,
            'groupId' => $groupId,
            'examId' => $examId,
            'academicYearId' => $academicYearId,
        ]);
    }

    public function migratedList(Request $request)
    {
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

            return view('backend.students.student_reports.migrated_list.index', [
                'sectionId' => $sectionId,
                'academicYearId' => $academicYearId,
                'migratedLists' => $migratedLists,
            ]);
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

            return view('backend.students.student_reports.migrated_list.index', [
                'sectionId' => $sectionId,
                'academicYearId' => $academicYearId,
                'migratedLists' => $migratedLists,
            ]);
        }
    }

    public function migratedListReport(Request $request)
    {
        if (($request->section_id == NULL) && ($request->academic_year_id == NULL)) {
            return view('backend.students.student_reports.migrated_report.index');
        } else {
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

                return view('backend.students.student_reports.migrated_report.report', [
                    'sectionId' => $sectionId,
                    'academicYearId' => $academicYearId,
                    'migratedLists' => $migratedLists,
                ]);
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

                return view('backend.students.student_reports.migrated_report.report', [
                    'sectionId' => $sectionId,
                    'academicYearId' => $academicYearId,
                    'migratedLists' => $migratedLists,
                ]);
            }
        }
    }

    public function quickSearch(Request $request)
    {
        $sectionId = $request->section_id ?? NULL;
        $academicYearId = $request->academic_year_id ?? NULL;

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

        return view('backend.students.student_reports.quick_search.index', [
            'sectionId' => $sectionId,
            'academicYearId' => $academicYearId,
            'sectionWiseStudents' => $sectionWiseStudents,
        ]);
    }

    public function quickSearchShow($id)
    {
        $student = Student::query()
            ->select(
                'students.*',
                'students.id as student_id',
                'student_sessions.*',
                'student_groups.group_name',
                'sections.section_name',
                'classes.class_name',
                'users.*'
            )
            ->where('students.id', $id)
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('users', 'users.id', '=', 'students.user_id')
            ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->leftJoin('student_groups', 'students.group', '=', 'student_groups.id')
            ->first();

        $studentSession = StudentSession::where("student_id", $id)
            ->where("session_id", get_option('academic_year'))
            ->first();

        $class = ClassModel::find($studentSession->class_id);
        $section = Section::find($studentSession->section_id);

        $subjects = Subject::select('*', 'subjects.id AS id')
            ->join('classes', 'classes.id', '=', 'subjects.class_id')
            ->where('subjects.class_id', $studentSession->class_id)
            ->get();

        $routine = ClassRoutine::getRoutineView($studentSession->class_id, $studentSession->section_id);

        $exams = DB::select("SELECT marks.exam_id,marks.class_id,marks.section_id,marks.subject_id, exams.name
                FROM marks,exams WHERE marks.exam_id=exams.id AND marks.student_id=:student_id
                AND marks.class_id=:class GROUP BY marks.exam_id", ["student_id" => $id, "class" => $studentSession->class_id]);

        $existing_marks = DB::select("SELECT marks.subject_id, marks.exam_id,mark_details.* from mark_details,marks WHERE mark_details.mark_id=marks.id
		                 AND marks.class_id=:class AND marks.student_id=:student", ["class" => $studentSession->class_id, "student" => $id]);

        $mark_head = DB::select("SELECT distinct mark_details.mark_type from mark_distributions
                    JOIN mark_details JOIN marks ON mark_details.mark_type = mark_distributions.mark_distribution_type
                    AND mark_details.mark_id=marks.id WHERE
                    marks.class_id=:class AND marks.student_id=:student", ["class" => $studentSession->class_id, "student" => $id]);

        $mark_details = [];

        foreach ($existing_marks as $key => $val) {
            if ($val->mark_id != "") {
                $mark_details[$val->subject_id][$val->exam_id][$val->mark_type] = $val;
            }
        }

        return view('backend.students.student_reports.quick_search.show', [
            'student' => $student,
            'subjects' => $subjects,
            'routine' => $routine,
            'class' => $class,
            'section' => $section,
            'exams' => $exams,
            'mark_head' => $mark_head,
            'mark_details' => $mark_details
        ]);
    }

    public function studentReportDownload($id)
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
            ->where('students.id', $id)
            ->with('studentGroup', 'studentSession')
            ->select('*', 'students.id as studentId')
            ->first();

        if (!$student) {
            return back()->with('error', "Not Found");
        }

        $studentName = @isset($student->first_name) ? $student->first_name . ' ' . $student->last_name ?? '' : 'Unknown Student';
        $pdf = PDF::loadView('backend.students.student_reports.quick_search.download_report', compact('student'));

        return $pdf->download('Profile_Of_' . $studentName . '.pdf');
    }
    public function studentSessionReportIndex()
    {
        return view('backend.students.student_reports.summary.session');
    }
    public function studentSessionReport(Request $request)
    {
        $session = $request->session_id;
        $students = StudentSession::where('session_id', $session)
            ->with('student', 'session', 'class', 'section')->get();
        return view('backend.students.student_reports.new-pdf.session', compact('students'));
    }
}
