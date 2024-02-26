<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeTaxRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'payroll_name_id' => 'required|exists:payroll_names,id',
            'name' => 'required|string',
            'min_income' => 'required|numeric|min:0',
            'max_income' => 'nullable|numeric|min:0',
            'tax_rate' => 'required|numeric|min:0',
            'deduction' => 'required|numeric|min:0',
            'details' => 'nullable|string',
            'status' => 'nullable|integer|in:0,1',
        ];
    }
}
