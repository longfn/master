<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($user)
    {
        $this->target = $user;
    }

    public function build()
    {
        $targetUser = $this->target->all();
        return $this->view('mails.confirmation', [
            'user' => $targetUser,
        ]);
    }
}
