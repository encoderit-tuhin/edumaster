<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PayslipCreateRequest extends FormRequest
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
        // base on request type - class, section, student
        // I need different required fields.
        // if type is class, then class field is required
        // if type is section, then section field is required
        // if type is student, then student_id field is required
        return [
            'session_id' => 'required|numeric',
            'type' => [
                'required',
                'string',
                Rule::in(['class', 'section', 'student']),
            ],
            'class_id' => 'nullable|numeric',
            'section_id' => 'nullable|numeric',
            'student_id' => 'nullable|numeric',
            'fee_head_id' => 'required|numeric',
            'fee_sub_head_ids' => 'required|array',
        ];
    }
}
