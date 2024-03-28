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
            'static_amount' => 'nullable|numeric|min:0',
            'total_paid_amount' => 'nullable|numeric|min:0',
            'monthly_payment' => 'nullable|numeric|min:0',
        ];
    }
}
