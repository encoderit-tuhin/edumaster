<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'student_id' => 'required|integer',
            'exam_name' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'passing_year' => 'required|integer',
            'session' => 'required|string|max:50',
            'board_name' => 'required|string|max:255',
            'board_roll_no' => 'required|string|max:20',
            'board_reg_no' => 'required|string|max:20',
            'gpa' => 'required|numeric',
            'grade' => 'required|string|max:10',
            'session' => 'required|string|max:50',
        ];
    }
}
