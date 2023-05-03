<?php

namespace App\Http\Requests;

use App\Models\RBAC\Permission;
use Illuminate\Foundation\Http\FormRequest;

class PermissionModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Permission::RULES;
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имени обязательно для заполнения',
            'slug.required' => 'Поле slug обязательно для заполнения'
        ];
    }
}
