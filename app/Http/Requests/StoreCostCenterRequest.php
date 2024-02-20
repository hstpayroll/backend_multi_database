<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCostCenterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You may adjust the authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|string|unique:cost_centers,code,' . ($this->costCenter ? $this->costCenter->id : 'NULL'),
            'description' => 'required|string',
            'status' => 'nullable|integer|in:0,1',
        ];
    }
}
