<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('permissions')->ignore($this->permission),
            ],
            'key' => [
                'required',
                Rule::unique('permissions')->ignore($this->permission),
            ],
            'permission_group_id' => [
                'required',
                'numeric',
                'gt:0',
                Rule::exists('permission_groups', 'id'),
            ],
        ];
    }
}
