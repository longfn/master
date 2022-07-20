<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserProfile extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $fileAttached;

    public function __construct($user, $fileAttached = null)
    {
        $this->user = $user;
        $this->fileAttached = $fileAttached;
    }

    public function build()
    {
        $mail = $this->view('mails.inform-user-profile-mail', [
            'user' => $this->user,
        ]);
        if ($this->fileAttached) {
            $mail->attach($this->fileAttached, [
                'as' => ''.$this->fileAttached->getClientOriginalName(),
            ]);
        }

        return $mail;
    }
}
