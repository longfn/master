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
    protected $file;

    public function __construct($user, $file)
    {
        $this->user = $user;
        $this->file = $file;
    }

    public function build()
    {
        if (!$this->file) {
            return $this->view('mails.inform-user-profile-mail', [
                'user' => $this->user,
            ]);
        }
        return $this->view('mails.inform-user-profile-mail', [
            'user' => $this->user,
        ])->attach($this->file, [
            'as' => ''.$this->file->getClientOriginalName(),
        ]);
    }
}
