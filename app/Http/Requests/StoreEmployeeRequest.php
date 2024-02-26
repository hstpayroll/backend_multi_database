<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can implement authorization logic here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
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
            'image' => 'nullable|string', // Assuming the image will be stored as a string (path or URL)
            'status' => 'nullable|boolean',
            'comment' => 'nullable|string',
        ];
    }
}
