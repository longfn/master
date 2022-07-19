<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateNotStartWithNumber implements Rule
{
    public function passes($attribute, $value)
    {
        return !is_numeric(substr($value, 0, 1));
    }
    public function message()
    {
        return 'The :attribute can not start with number.';
    }
}
