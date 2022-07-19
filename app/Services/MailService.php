<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\UserProfile;

class MailService
{
    public function sendUserProfile($user, $file = null)
    {
        Mail::to($user['email'])->send(new UserProfile($user, $file));
    }
}
