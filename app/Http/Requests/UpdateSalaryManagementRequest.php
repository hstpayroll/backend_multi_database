<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryManagementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'reason' => 'required|string',
            'old_salary' => 'nullable|numeric|min:0',
            'new_salary' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'nullable|integer|in:0,1',
        ];
    }
}
