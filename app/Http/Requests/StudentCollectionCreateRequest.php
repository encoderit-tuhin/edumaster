<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCollectionCreateRequest extends FormRequest
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
            'student_id' => 'required',
            'total_paid' => 'required|numeric',
            'total_payable' => 'required|numeric',
            'total_due' => 'required|numeric',
            'date' => 'required',
            'ledger_id' => 'required',
            'sub_head_ids' => 'nullable',

            // 'fee_heads.*.sub_head_id' => 'required',
            // 'fee_heads.*.paid_amount' => 'required|numeric',
            // 'fee_heads.*.waiver' => 'required|numeric',
            // 'fee_heads.*.fine_payable' => 'required|numeric',
            // 'fee_heads.*.fee_payable' => 'required|numeric',
            // 'fee_heads.*.fee_and_fine_payable' => 'required|numeric',
            // 'fee_heads.*.previous_due_payable' => 'required|numeric',
            // 'fee_heads.*.previous_due_paid' => 'required|numeric',
            // 'fee_heads.*.total_payable' => 'required|numeric',

            // 'fee_heads.*' => 'required',
            // 'fee_heads.*.sub_head_id' => 'required_if:fee_heads.*.*,1',
            // 'fee_heads.*.paid_amount' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.waiver' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.fine_payable' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.fee_payable' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.fee_and_fine_payable' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.previous_due_payable' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.previous_due_paid' => 'required_if:fee_heads.*.*,1|numeric',
            // 'fee_heads.*.total_payable' => 'required_if:fee_heads.*.*,1|numeric',
        ];
    }
}
