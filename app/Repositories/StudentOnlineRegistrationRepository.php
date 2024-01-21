<?php

declare(strict_types=1);

namespace App\Repositories;

use App\PreviousExam;
use App\PreviousInstitute;
use App\StudentAdditionInformation;
use App\StudentOnlineRegistration;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentOnlineRegistrationRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return StudentOnlineRegistration::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = StudentOnlineRegistration::orderBy('id', 'desc');

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?StudentOnlineRegistration
    {
        return StudentOnlineRegistration::create($data);
    }

    public function update(array $data, int $id)
    {
        return StudentOnlineRegistration::find($id)
            ->update($data);
    }

    public function delete(int $id)
    {
        return StudentOnlineRegistration::destroy($id);
    }

    public function show(int $id)
    {
        return StudentOnlineRegistration::find($id);
    }
    public function findStudentOnlineRegistrationByStudentId(int $id)
    {
        return StudentOnlineRegistration::where('student_id', $id)->first();
    }
    public function storeStudentAllInformation($data, $student_id)
    {
        // dd($data);
        // exam and academic info
        // $examData = [
        //     'student_id' => $student_id,
        //     'exam_name' => "ssc",
        //     'ssc_group' => $data->group,
        //     'board' => $data->board,
        //     'roll_no' => $data->board_roll,
        //     'registration' => $data->registration_number,
        //     'session' => $data->passing_year,
        //     'grade' => $data->grade,
        //     'point' => $data->gpa_without_4th,
        //     'nick_name' => $data->nick_name,
        //     'school_name' => $data->school_name,
        //     'school_address' => $data->school_address,
        //     'center' => $data->center,
        //     'passing_year' => $data->passing_year,
        //     'bangla' => $data->bangla,
        //     'english' => $data->english,
        //     'math' => $data->math,
        //     // If this field is nullable
        //     'bk' => $data->bk,
        //     'gpa_with_4th' => $data->gpa_with_4th,
        //     'gpa_without_4th' => $data->gpa_without_4th,
        //     'total_a_plus' => $data->total_a_plus,
        //     'grade_4th_sub' => $data->grade_4th_sub,
        //     'chemistry' => $data->chemistry,
        //     'biology' => $data->biology,
        //     'higherMath' => $data->higherMath,
        //     'bangladeshWorld' => $data->bangladeshWorld,
        //     'agricultureStudies' => $data->agricultureStudies,
        //     'homeScience' => $data->homeScience,
        //     'other' => $data->other,
        //     'financeBanking' => $data->financeBanking,
        //     'accounting' => $data->accounting,
        //     'businessEnt' => $data->businessEnt,
        //     'generalScience' => $data->generalScience,
        //     'music' => $data->music,
        //     'geography' => $data->geography,
        //     'civicCitizenship' => $data->civicCitizenship,
        //     'economics' => $data->economics,
        //     'historyBangladesh' => $data->historyBangladesh

        // ];
        $examData2 = [
            'student_id' => $student_id,
            'exam_name' => "ssc",
            'ssc_group' => $data->group,
            'ssc_board' => $data->board,
            'ssc_roll_no' => $data->ssc_roll_no,
            'ssc_registration' => $data->ssc_registration,
            'ssc_session' => $data->ssc_passing_year,
            'ssc_grade' => $data->ssc_grade,
            'ssc_point' => $data->gpa_without_4th,
            'nick_name' => $data->nick_name,
            'school_name' => $data->school_name,
            'school_address' => $data->school_address,
            'center' => $data->center,
            'ssc_passing_year' => $data->ssc_passing_year,
            'bangla' => $data->bangla,
            'english' => $data->english,
            'math' => $data->math,
            'higher_math' => $data->higher_math ?? null,
            // If this field is nullable
            'bk' => $data->bk,
            'gpa_with_4th' => $data->gpa_with_4th,
            'gpa_without_4th' => $data->gpa_without_4th,
            'total_a_plus' => $data->total_a_plus,
            'grade_4th_sub' => $data->grade_4th_sub,
            'hsc_result_roll_no' => $data->hsc_result_roll_no,
            'hsc_result_year' => $data->hsc_result_year,
            'hsc_result_reg_no' => $data->hsc_result_reg_no,
            'hsc_result_session' => $data->hsc_result_session,
            'hsc_result_gpa' => $data->hsc_result_gpa,
            'hsc_result_num_of_a_plus' => $data->hsc_result_num_of_a_plus,
            'hsc_result_total_appeared' => $data->hsc_result_total_appeared,
            'hsc_result_total_passed' => $data->hsc_result_total_passed,
            'hsc_result_percentage' => $data->hsc_result_percentage,
            'hsc_result_total_examinees_combined' => $data->hsc_result_total_examinees_combined,
            'hsc_result_subjects_a_plus' => $data->hsc_result_subjects_a_plus,
            'ssc_chemistry' => $data->chemistry,
            'ssc_biology' => $data->biology,
            'ssc_higherMath' => $data->higherMath,
            'ssc_bangladeshWorld' => $data->bangladeshWorld,
            'ssc_agricultureStudies' => $data->agricultureStudies,
            'ssc_homeScience' => $data->homeScience,
            'ssc_other' => $data->other,
            'ssc_financeBanking' => $data->financeBanking,
            'ssc_accounting' => $data->accounting,
            'ssc_businessEnt' => $data->businessEnt,
            'ssc_generalScience' => $data->generalScience,
            'ssc_music' => $data->music,
            'ssc_geography' => $data->geography,
            'ssc_civicCitizenship' => $data->civicCitizenship,
            'ssc_economics' => $data->economics,
            'ssc_historyBangladesh' => $data->historyBangladesh
        ];
        // dd($examData2);
        PreviousExam::create($examData2);

        $instituteData = [
            'student_id' => $student_id,
            'institute_address' => $data->school_address,
            'last_education' => $data->school_address,
            'institute_name' => $data->institute_name,
            'institute_no' => $data->institute_no,
            'institute_mobile' => $data->institute_mobile,
            'institute_phone' => $data->institute_phone,
            'institute_email' => $data->institute_email,
            'time_period' => $data->time_period,
        ];
        PreviousInstitute::create($instituteData);

        // ex: parent and local address
        $additionInfo = [
            'student_id' => $student_id,
            'bangla_name' => $data->bangla_name,
            'father_designation' => $data->father_designation,
            'mother_designation' => $data->mother_designation,
            'father_office_address' => $data->father_office_address,
            'mother_office_address' => $data->mother_office_address,
            'permanent_address' => $data->permanent_address,
            'present_address' => $data->present_address,
            'permanent_address_phone' => $data->present_address_phone,
            'present_address_phone' => $data->present_address_phone,
            'monthly_income_parents' => $data->monthly_income_parents,
            'monthly_income_family' => $data->monthly_income_family,
            'permanent_district' => $data->permanent_district,
            'date_of_admission' => $data->date_of_admission,
        ];

        StudentAdditionInformation::create($additionInfo);





        // return StudentOnlineRegistration::find($id);
    }

    /**
     * Update student id in student online registration table
     */
    public function updateStudentOnlineRegistratioStudentId($user, $student, $onlineRegistrationId)
    {
        // Update student id in student online registration table
        $studentOnlineRegistration = StudentOnlineRegistration::find($onlineRegistrationId);

        if ($studentOnlineRegistration) {
            $studentOnlineRegistration->user_id = $user->id;
            $studentOnlineRegistration->student_id = $student->id;
            $studentOnlineRegistration->save();
        }

        return true;
    }
}
