<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePayrollPeriodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can implement authorization logic here
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'payroll_name_id' =>  'required|exists:payroll_names,id',
            'payroll_type_id' =>  'required|exists:payroll_types,id',
            'fiscal_year_id' =>  'required|exists:fiscal_years,id',
            'employee_pension_id' =>  'required|exists:employee_pensions,id',
            'company_pension_id' =>  'required|exists:company_pensions,id',
        ];
    }
}
