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
                'nullable',
                'boolean',
            ],
            'value' => [
                'required_if:is_employee_specific,0',
                'nullable',
                'numeric',
                Rule::when(request()->input('is_employee_specific') === '0', ['gt:0']),
                Rule::when(request()->input('is_employee_specific') === '0', function ($attribute, $value, $fail) {
                    if (!is_null($value) && $value <= 0) {
                        $fail('The value must be greater than 0 when is_employee_specific is false.');
                    }
                }),
            ],
            'status' => 'nullable|boolean|in:1,0',
        ];
    }
}
