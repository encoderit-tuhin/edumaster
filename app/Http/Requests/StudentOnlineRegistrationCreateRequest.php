<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentOnlineRegistrationCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'class_id' => 'required',
            'phone' => 'required|string|min:11|max:11',
            'first_name' => 'required|string|max:191',
            'last_name' => 'nullable|string|max:191',
            'birthday' => 'required',
            'gender' => 'nullable|string|max:10',
            'religion' => 'nullable|string|max:20',
            'blood_group' => 'nullable|string|max:4',
            'country' => 'nullable|string|max:100',
            'group' => 'nullable|string|max:191',
            'father_name' => 'nullable',
            'mother_name' => '',
            'father_occupation' => '',
            'mother_occupation' => '',
            'father_designation' => '',
            'mother_designation' => '',
            'father_office_address' => '',
            'mother_office_address' => '',
            'permanent_address' => '',
            'present_address' => '',
            'permanent_address_phone' => '',
            'present_address_phone' => '',
            'monthly_income_parents' => '',
            'monthly_income_family' => '',
            'permanent_district' => '',
            'roll_number' => '',
            'nick_name' => '',
            'ssc_group' => '',
            'school_name' => '',
            'school_address' => '',
            'board' => '',
            'center' => '',
            'passing_year' => '',
            'board_roll' => '',
            'registration_number' => '',
            'vital_201' => '',
            'sect' => '',
            'application_number' => '',
            'date_of_admission' => 'nullable',
            'bangla' => '',
            'english' => '',
            'math' => '',
            'higher_math' => '',
            'bk' => '',
            'gpa_with_4th' => '',
            'gpa_without_4th' => '',
            'total_a_plus' => '',
            'grade_4th_sub' => '',
            'student_id' => '',
            'physics' => '',
            'chemistry' => '',
            'biology' => '',
            'higherMath' => '',
            'bangladeshWorld' => '',
            'agricultureStudies' => '',
            'homeScience' => '',
            'other' => '',
            'financeBanking' => '',
            'accounting' => '',
            'businessEnt' => '',
            'generalScience' => '',
            'music' => '',
            'geography' => '',
            'civicCitizenship' => '',
            'economics' => '',
            'historyBangladesh' => '',
            'ict' => ''
        ];

        // For update requests, exclude the 'image' field if no new image is uploaded
        if ($this->getMethod() == 'PUT' || $this->getMethod() == 'PATCH') {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,gif';
        }

        return $rules;
    }
}
