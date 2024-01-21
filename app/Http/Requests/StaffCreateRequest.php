<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffCreateRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'sl' => 'nullable|integer',
            'blood' => 'nullable|string',
            'address' => 'required',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' =>  'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
        ];
    }
}
