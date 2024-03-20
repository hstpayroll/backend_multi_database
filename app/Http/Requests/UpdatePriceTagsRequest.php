<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePriceTagsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'package_name' => 'required',
            'minimum_employee' => 'required|integer|min:1',
            'maximum_employee' => 'required|integer|min:' . request('minimum_employee'),
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'nullable', // Description is optional
            'status' => 'nullable|boolean|in:0,1', // Status must be 0 or 1
        ];
    }
}
