<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\ConfirmationMail;

class MailService
{
    public function sendConfirmation($user)
    {
        Mail::to($user['email'])->send(new ConfirmationMail($user));
    }
}
