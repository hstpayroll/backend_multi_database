<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeductionTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'payroll_period_id' => 'required|exists:payroll_periods,id',
            'employee_id' => 'required|exists:employees,id',
            'deduction_id' => 'required|exists:deductions,id',
            'amount_deducted' => 'required|numeric|min:0',
            'outstanding_amount' => 'required|numeric|min:0',
            'is_partial' => 'required|boolean',
            'is_missed' => 'required|boolean',
            'start_date' => 'nullable|date',
        ];
    }
}
