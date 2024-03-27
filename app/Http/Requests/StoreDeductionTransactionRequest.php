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
            'deduction_id' => 'required|exists:deductions,id',
            'amount_deducted' => 'nullable|numeric|min:0',
            'paid_amount' => 'nullable|numeric|min:0',
            'outstanding_amount' => 'nullable|numeric|min:0',
        ];
    }
}
