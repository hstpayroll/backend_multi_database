<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|unique:companies',
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
            'description' => 'required|text',
        ];
    }
}
