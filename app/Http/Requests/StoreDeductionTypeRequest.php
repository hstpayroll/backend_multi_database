<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeductionTypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'main_deduction_id' => 'required|exists:main_deductions,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_continuous' => 'required|boolean',
            'is_employee_specific' => 'required|boolean',
            'value_type' => [
                'required_if:is_employee_specific,1',
                'boolean',
            ],
            'value' => [
                'required_if:is_employee_specific,1',
                'numeric',
                Rule::when($this->value_type === '1', ['between:0,100']),
                Rule::when($this->value_type === '0', ['min:0']),
            ],
            'status' => 'nullable|string|in:active,inactive,directive',
        ];
    }
}
