<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ValidateEmail implements Rule
{
    public function passes($attribute, $value)
    {
        $users = Session::get('user');
        if (!empty($users)) {
            foreach($users as $user) {
                if (!strcmp($value, $user['email'])) {
                    return false;
                }
            }
        }
        return true;
    }

    public function message()
    {
        return 'The :attribute already exists.';
    }
}
