<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
      /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Typically, you would define authorization logic here
        // For example, check if the authenticated user has permission to perform the action
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Define validation rules for creating or updating an employee
        return [
            'emp_id' => 'required|string|unique:employees,emp_id',
            'first_name' => 'required|string',
            'father_name' => 'required|string',
            'gfather_name' => 'required|string',
            'sex' => 'required|boolean',
            'birth_date' => 'required|date',
            'hired_date' => 'nullable|date',
            'tin_no' => 'nullable|string',
            'cost_center' => 'nullable|integer',
            'tax_region_id' => 'required|exists:tax_regions,id',
            'grade_id' => 'required|exists:grades,id',
            'department_id' => 'required|exists:departments,id',
            'sub_department_id' => 'required|exists:sub_departments,id',
            'position_id' => 'required|exists:positions,id',
            'employment_type_id' => 'required|exists:employment_types,id',
            'citizenship_id' => 'required|exists:citizenships,id',
            'email' => 'nullable|email',
            'bank_id' => 'required|exists:banks,id',
            'account_number' => 'nullable|string',
            'image' => 'nullable|string',
            'status' => 'nullable|boolean',
            'comment' => 'nullable|string',
        ];
    }
}
