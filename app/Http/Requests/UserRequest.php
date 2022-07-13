<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateUserName;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
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
            'password' => 'required|min:8|regex:/^0-9@#$%&*+$/|confirmed',
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
            'password.required' => __('Bạn chưa nhập Mật khẩu.'),
            'password.confirmed' => __('Mật khẩu không khớp.'),
            'password.min' => __('Mật khẩu không được nhỏ hơn 8 ký tự.'),
            'fblink.url' => __('Link Facebook không hợp lệ'),
            'ytlink.url' => __('Link Youtube không hợp lệ'),
	    ];
	}
}
