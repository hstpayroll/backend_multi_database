<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreAllowanceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'main_allowance_id' => 'required|exists:main_allowances,id',
            'name' => 'required|string',
            'taxability' => 'required|integer|between:1,4',
            'tax_free_amount' => ($this->taxability == 3) ? 'required|numeric' : 'nullable',
            'value_type' => 'required|boolean',
            'value' => ($this->value_type == 0) ? 'required|numeric|gt:0' : 'required|integer|between:1,100',
            'status' => 'nullable|integer',
        ];

        if ($this->taxability != 3 && $this->input('tax_free_amount')) {
            $validator = Validator::make([], []); // Empty data array
            $validator->errors()->add('tax_free_amount', 'The tax_free_amount field should be set to null when taxability is not tax_with_limit.');
            throw new ValidationException($validator);
        }

        return $rules;
    }
}
