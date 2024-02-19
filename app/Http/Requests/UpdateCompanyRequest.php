<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Faker\Provider\zh_TW\Company;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{

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
        $companyId = $this->route('company');
        return [
            'name' => [
                'required',
                Rule::unique('companies')->ignore($companyId),
            ],
            'address' => 'required',
            'tin' => 'required',
            'logo' => 'nullable|image|max:2048',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone_number' => 'required',
            'address_line' => 'required',
            'city' => 'required',
            'sub_city' => 'required',
            'kebele' => 'required',
            'woreda' => 'required',
            'house_no' => 'required',
            'fax' => 'required',
            'currency_id' => 'required|exists:currencies,id', // Adjust 'currencies' and 'id' based on your table and column names
            'calendar_id' => 'required|exists:calendars,id',
            'description' => 'required',
        ];
    }
}
