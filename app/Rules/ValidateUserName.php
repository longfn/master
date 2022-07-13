<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateUserName implements Rule
{
    public function passes($attribute, $value)
    {
        return (!is_numeric(substr($value, 0, 1)));
    }
    public function message()
    {
        return 'Tên không được bắt đầu bằng số.';
    }
}
