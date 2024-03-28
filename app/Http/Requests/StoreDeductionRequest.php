<?php

namespace App\Http\Requests;

use App\Models\Tenant\Deduction;
use App\Models\Tenant\DeductionType;
use App\Models\Tenant\Employee;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $deductionType = DeductionType::findOrFail($this->input('deduction_type_id'));
        $isContinuous = $deductionType->is_continuous;

        $rules = [
            'employee_id' => 'required|exists:employees,id',
            'deduction_type_id' => 'required|exists:deduction_types,id',
            'status' => 'nullable|boolean|in:1,0',
        ];

        if ($isContinuous == 1) {
            $rules += [
                'total_paid_amount' => 'required|numeric',
                'monthly_payment' => 'required|numeric',
                'status' => 'required|string|in:active,inactive',
            ];
        } else {
            $rules['static_amount'] = 'nullable|numeric';

            if ($deductionType->value_type == 1) {
                // Logic for value calculation based on percentage and employee's salary
                $employee = Employee::findOrFail($this->input('employee_id'));
                $value = $deductionType->value / 100 * $employee->salary;
                $this->merge(['static_amount' => $value]);
            } else {
                $this->merge(['static_amount' => $deductionType->value]);
            }

            // Set default values of 'value_type' and 'value' to 0 if they are null
            $this->merge([
                'value_type' => $this->input('value_type', 0),
                'value' => $this->input('value', 0),
            ]);
        }

        return $rules;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $count = Deduction::where('employee_id', $this->input('employee_id'))
                ->where('deduction_type_id', $this->input('deduction_type_id'))
                ->where('status', 1)
                ->count();

            if ($count > 0) {
                $validator->errors()->add('error', 'The employee is already associated with the deduction type with an active status.');
            }
        });
    }
}