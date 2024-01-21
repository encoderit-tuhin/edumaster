<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
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
        $bookId = $this->route('book');

        return [
            'name' => 'required|string|max:191',
            'code' => [
                'required',
                'string',
                Rule::unique('books', 'code')->ignore($bookId),
                'max:50',
            ],
            'category_id' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'rack_no' => 'required',
            'quantity' => 'required',
            'publish_date' => 'required',
            'photo' => 'nullable|image|max:5120',
            'barcode' => 'nullable|image|max:5120',
            'description' => 'nullable|string',
        ];
    }
}
