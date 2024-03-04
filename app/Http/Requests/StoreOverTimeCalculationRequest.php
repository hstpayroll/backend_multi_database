<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOverTimeCalculationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'over_time_type_id' => 'required|exists:over_time_types,id',
            'ot_date' => 'required|date',
            'ot_hour' => 'required|numeric|min:0',
            'ot_value' => 'required|numeric|min:0',
        ];
    }
}
