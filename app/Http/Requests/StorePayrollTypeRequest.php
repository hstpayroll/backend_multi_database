<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePayrollTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this according to your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ];
    }
}
