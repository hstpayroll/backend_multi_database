<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'expected_end_date' => 'required|date',
            'duration_months' => 'required|integer|min:0',
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|integer|in:0,1',
            'termination_date' => 'nullable|date|required_if:status,1',
        ];
    }
}
