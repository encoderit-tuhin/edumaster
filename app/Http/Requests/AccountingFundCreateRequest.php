<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AccountingFundCreateRequest extends FormRequest
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
        $accountFundId = $this->route('accounting-fund');

        $commonRules = [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'serial' => 'nullable|numeric',
        ];

        if ($accountFundId === null) {
            $commonRules['name'][] = Rule::unique('accounting_funds', 'name');
        } else {
            $commonRules['name'][] = Rule::unique('accounting_funds', 'name')->ignore($accountFundId);
        }

        return $commonRules;
    }
}
