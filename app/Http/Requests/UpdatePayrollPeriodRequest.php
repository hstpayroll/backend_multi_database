<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePayrollPeriodRequest extends FormRequest
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
            'income_tax_id' => 'required|exists:App\Models\Tenant\IncomeTax,id',
            'payroll_type_id' => 'required|exists:App\Models\Tenant\PayrollType,id',
            'fiscal_year_id' => 'required|exists:App\Models\Tenant\FiscalYear,id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|boolean',
        ];
    }
}
