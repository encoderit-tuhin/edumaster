<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class committeeRequest extends FormRequest
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

            'name' => 'required|string|max:180',
            'post' => 'required|string|max:180',
            'phone' => 'required|string|max:180',
            'address' => 'required|string|max:180',
            'year_from' => 'required|date|max:180',
            'year_to' => 'required|date|max:180',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
