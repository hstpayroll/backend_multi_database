<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /* Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /* Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=> 'required|string|max:255', 
            'last_name'=> 'required|string|max:255', 
            'email' => 'required|string|max:255', 
            'phone_number' => 'required|string', 
            'company_name' => 'required|string', 
            'total_number_of_employees' => 'required|integer|min:1', 
            'country' => 'required|string', 
            'city' => 'nullable|string', 
            'sub_city' => 'nullable|string',
        ];
    }
}