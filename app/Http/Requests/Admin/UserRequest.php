<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateUserName;
use App\Rules\ValidateEmail;

class UserRequest extends FormRequest
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
                'min:2',
                'not_regex:/^[@#$%&*]/',
                new ValidateUserName(),
            ],
            'email' => [
                'required',
                'email',
                'not_regex:/^[root]/',
                new ValidateEmail(),
            ],
            'password' => 'required|min:8|regex:/^[0-9@#$%&*]+$/|confirmed',
            'address' => '',
            'fblink' => 'url',
            'ytlink' => 'url',
            'description' => ''
        ];
    }
}
