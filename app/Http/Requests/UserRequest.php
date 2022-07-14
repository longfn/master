<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateUserName;

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
            'email' => 'required|email|not_regex:/^[root]/',
            'password' => 'required|min:8|regex:/^[0-9@#$%&*]+$/|confirmed',
            'fblink' => 'url',
            'ytlink' => 'url'
        ];
    }

    public function messages()
	{
	    return [
            'name.required' => __('Bạn chưa nhập Tên.'),
            'name.min' => __('Tên không được nhỏ hơn 2 ký tự.'),
            'email.required' => __('Bạn chưa nhập Email.'),
            'email.email' => __('Hãy nhập email.'),
            'password.required' => __('Bạn chưa nhập Mật khẩu.'),
            'password.min' => __('Mật khẩu không được nhỏ hơn 8 ký tự.'),
            'password.confirmed' => __('Mật khẩu không khớp.'),
            'fblink.url' => __('Link Facebook không hợp lệ'),
            'ytlink.url' => __('Link Youtube không hợp lệ'),
	    ];
	}
}
