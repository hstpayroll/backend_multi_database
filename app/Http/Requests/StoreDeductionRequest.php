<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'deduction_type_id' => 'required|exists:deduction_types,id',
            'value_type' => 'required|boolean',
            'value' => 'required|numeric|min:0',
            'status' => 'nullable|boolean',
        ];
    }
}
