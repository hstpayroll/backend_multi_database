<?php

namespace App\Http\Requests;

use App\Models\Tenant\DeductionType;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeductionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // return [
        //     'employee_id' => 'required|exists:employees,id',
        //     'deduction_type_id' => 'required|exists:deduction_types,id',
        //     'static_amount' => 'required|numeric',
        //     'total_paid_amount' => 'required_if:deduction_type_id,null|numeric',
        //     'monthly_payment' => 'required_if:deduction_type_id,null|numeric',
        //     'status' => 'required|string|in:active,inactive,directive',
        // ];
        $deductionType = DeductionType::findOrFail($this->input('deduction_type_id'));
        $isContinuous = $deductionType->is_continuous;

        if ($isContinuous == 1) {
            return [
                'employee_id' => 'required|exists:employees,id',
                'deduction_type_id' => 'required|exists:deduction_types,id',
                'total_paid_amount' => 'required|numeric',
                'monthly_payment' => 'required|numeric',
                'status' => 'required|string|in:active,inactive',
            ];
        } else {
            return [
                'employee_id' => 'required|exists:employees,id',
                'deduction_type_id' => 'required|exists:deduction_types,id',
                'static_amount' => 'required|numeric',
                'status' => 'required|string|in:active,inactive',
            ];
        }
    }
}