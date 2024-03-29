<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'loan_type_id' => 'required|exists:loan_types,id',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'expected_end_date' => 'required|date',
            'duration_months' => 'required|integer|min:0',
            'monthly_installment' => 'required|integer|min:0',
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|integer|in:0,1',
            'termination_date' => 'nullable|date|required_if:status,1',
        ];
    }
}
