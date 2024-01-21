<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeCreateRequest extends FormRequest
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
            'grade_name' => 'required|max:20',
            'marks_from' => 'required|numeric',
            'marks_to' => 'required|numeric',
            'point' => 'required|numeric',
            'note' => 'nullable|string'
        ];
    }
}
