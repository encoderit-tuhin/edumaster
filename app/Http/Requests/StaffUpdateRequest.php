<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You can adjust the authorization logic as needed
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
            'address' => 'required',
            'sl' => 'nullable|integer',
            'blood' => 'nullable|string',
            'password' => 'nullable|min:6|confirmed',
            'image' =>  'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
        ];
    }
}
