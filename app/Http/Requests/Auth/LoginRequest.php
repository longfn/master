<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|min:2',
            'password' => 'required|min:8',
        ];
    }

    public function getCredentials() {
        $credential = $this->validated();
        if (filter_var($credential['username'], FILTER_VALIDATE_EMAIL)) {
            return [
                'email' => $credential['username'],
                'password' => $credential['password']
            ];
        }

        return $credential;
    }
}
