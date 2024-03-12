<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAllowanceTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $baseRules = [
            'payroll_period_id' => 'required|exists:payroll_periods,id',
            'employee_id' => 'required|exists:employees,id',
            'allowance_type_id' => 'required|exists:allowance_types,id',
            'amount' => 'required|numeric',
            'is_day_based' => 'required|boolean', // Ensure is_day_based is present and boolean
            'number_of_date' => 'nullable|date|required_if:is_day_based,1',
        ];

        // Merge base rules with taxable amount rules
        $rules = array_merge($baseRules, $this->TaxableAmountRule());

        return $rules;
    }

    public function TaxableAmountRule()
    {
        $rules = [
            'taxable_amount' => 'nullable',
            'non_taxable_amount' => 'nullable',
            'sum_of_taxable_and_non_taxable' => 'nullable',
        ];

        $taxable = DB::table('allowance_types')
            ->where('id', request()->get('allowance_type_id'))
            ->value('taxability');
        //for taxable  validation
        if ($taxable === 1) {
            $rules['taxable_amount'] = ['required', 'numeric', Rule::in([request()->get('amount')])];
            $rules['non_taxable_amount'] = ['nullable', Rule::in(['0', '0'])];
        }
        //for non taxable validation
        if ($taxable === 2) {
            $rules['taxable_amount'] = ['nullable', Rule::in(['0', '0'])];
            $rules['non_taxable_amount'] = ['required', 'numeric', Rule::in([request()->get('amount')])];
        }
        //for partially taxable validation
        if ($taxable === 3) {
            $rules['taxable_amount'] = ['required', 'numeric'];
            $rules['non_taxable_amount'] = ['required', 'numeric'];
        }
        //for  taxable coved by employer validation
        if ($taxable === 4) {
            $rules['taxable_amount'] = ['required', 'numeric', Rule::in([request()->get('amount')])];
            $rules['non_taxable_amount'] = ['nullable', Rule::in(['0', '0'])];
        }

        return $rules;
    }
}
