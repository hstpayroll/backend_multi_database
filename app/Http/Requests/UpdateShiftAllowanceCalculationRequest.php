<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShiftAllowanceCalculationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'shift_allowance_type_id' => 'required|exists:shift_allowance_types,id',
            'employee_id' => 'required|exists:employees,id',
            'payroll_period_id' => 'required|exists:payroll_periods,id',
            'value' => 'required|numeric',
            'status' => 'nullable|boolean',
        ];
    }
}
