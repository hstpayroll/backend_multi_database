<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanPaymentRecordRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            'payroll_period_id' => 'required|exists:payroll_periods,id',
            'loan_id' => 'required|exists:loans,id',
            'amount_payed' => 'required|numeric|min:0',
            'outstanding_amount' => 'nullable|numeric|min:0',
            'is_partial' => 'required|boolean',
            'is_missed' => 'required|boolean',
        ];
    }
}
