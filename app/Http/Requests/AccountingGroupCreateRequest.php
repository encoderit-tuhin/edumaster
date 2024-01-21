<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AccountingGroupCreateRequest extends FormRequest
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
        $accountGroupId = $this->route('accounting-group');

        $commonRules = [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'accounting_category_id' => 'required|numeric',
            'code' => 'nullable|numeric',
        ];

        // if ($accountGroupId === null) {
        //     $commonRules['name'][] = Rule::unique('accounting_groups', 'name');
        // } else {
        //     $commonRules['name'][] = Rule::unique('accounting_groups', 'name')->ignore($accountGroupId);
        // }

        return $commonRules;
    }
}
