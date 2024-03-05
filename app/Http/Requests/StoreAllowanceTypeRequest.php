<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAllowanceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'main_allowance_id' => 'required|exists:main_allowances,id',
            'name' => 'required|string',
            'taxability' => 'required|integer',
            'tax_free_amount' => 'nullable|numeric|required_if:taxability,3',
            'value_type' => 'nullable|boolean',
            'status' => 'nullable|integer',
        ];
    }
}
