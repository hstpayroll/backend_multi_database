<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModelHasPermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ];
    }
}
