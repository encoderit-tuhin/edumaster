<?php

namespace App\Http\Requests;

use App\Rules\UniqueRoll;
use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
        return [
            'first_name' => 'required|string|max:191',
            'last_name' => 'nullable|string|max:191',
            'birthday' => 'required',
            'gender' => 'nullable|string|max:10',
            'blood_group' => 'nullable|string|max:4',
            'religion' => 'required|string|max:20',
            'phone' => 'required|string|max:20|unique:users',
            'state' => 'nullable|string',
            'country' => 'required|string|max:100',
            'class' => 'required',
            'section' => 'required',
            'group' => 'nullable|string|max:191',
            // 'register_no' => 'nullable||unique:students',
            'roll' => ['required', new UniqueRoll($this->section, $this->roll)],
            'activities' => 'nullable|string|max:191',
            'remarks' => 'nullable',
            'email' => 'nullable|string|email|max:191|unique:users',
            'password' => 'nullable|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
            'parent_id' => 'nullable|numeric',
            'user_type' => 'nullable|string',
            'address' => 'nullable|string',
            'is_online' => 'string',
            "father_name" => 'nullable',
            "mother_name" => 'nullable',
            "father_occupation" => 'nullable',
            "mother_occupation" => 'nullable',
            "father_designation" => 'nullable',
            "mother_designation" => 'nullable',
            "father_office_address" => 'nullable',
            "mother_office_address" => 'nullable',
            "permanent_address" => 'nullable',
            "present_address" => 'nullable',
            "permanent_address_phone" => 'nullable',
            "present_address_phone" => 'nullable',
            "monthly_income_parents" => 'nullable',
            "monthly_income_family" => 'nullable',
            "permanent_district" => 'nullable',
            "roll_number" => 'nullable',
            "nick_name" => 'nullable',
            "ssc_group" => 'nullable',
            "school_name" => 'nullable',
            "school_address" => 'nullable',
            "board" => 'nullable',
            "center" => 'nullable',
            "passing_year" => 'nullable',
            "board_roll" => 'nullable',
            "registration_number" => 'nullable',
            "vital_201" => 'nullable',
            "sact" => 'nullable',
            "application_number" => 'nullable',
            "date_of_admission" => 'nullable',
            "bangla" => 'nullable',
            "english" => 'nullable',
            "math" => 'nullable',
            "higher_math" => 'nullable',
            "bk" => 'nullable',
            "gpa_with_4th" => 'nullable',
            "gpa_without_4th" => 'nullable',
            "total_a_plus" => 'nullable',
            "grade_4th_sub" => 'nullable',
        ];
    }
}