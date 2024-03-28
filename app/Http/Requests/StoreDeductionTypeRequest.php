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
            'is_employee_specific' => [
                'required',
                'boolean',
                function ($attribute, $value, $fail) {
                    $isContinuous = request()->input('is_continuous');

                    if ($isContinuous === '1' && $value !== 1) {
                        $fail('The is_employee_specific field must be true when is_continuous is true.');
                    }

                    if ($isContinuous === '0' && !in_array($value, [0, 1])) {
                        $fail('The is_employee_specific field must be true or false when is_continuous is false.');
                    }
                }
            ],
            'value_type' => [
                'required_if:is_employee_specific,0',
                'boolean',
            ],
            'value' => [
                'required_if:is_employee_specific,0',
                'numeric',
                Rule::when($this->value_type === '1', ['gt:0', 'lte:100']),
                Rule::when($this->value_type === '0', ['gt:0']),
            ],
            'status' => 'nullable|boolean|in:1,0',
        ];
    }
}
