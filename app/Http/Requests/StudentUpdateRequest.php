<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'last_name' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:10',
            'blood_group' => 'nullable|string|max:4',
            'religion' => 'required|string|max:20',
            'phone' => 'string|max:20',
            'state' => 'nullable|string',
            'country' => 'required|string|max:100',
            'class' => 'required',
            'section' => 'required',
            'group' => 'nullable|string|max:191',
            'activities' => 'nullable|string|max:191',
            'remarks' => 'nullable',
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
            'parent_id' => 'nullable|numeric',
            'register_no' => 'nullable|numeric',
            'address' => 'nullable|string',
        ];
    }
}
