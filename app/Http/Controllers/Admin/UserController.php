<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\SendMailUserProfileRequest;
use App\Services\MailService;

class UserController extends Controller
{
    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => getSessionUsers(),
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        Session::push('users', $request->validated());

        return view('admin.user.index', [
            'users' => getSessionUsers(),
        ]);
    }

    public function getMailForm()
    {
        return view('admin.user.form-send-mail', [
            'users' => getSessionUsers(),
        ]);
    }

    public function sendMail(SendMailUserProfileRequest $request)
    {
        $targetMail = $request->validated()['mail'];
        $users = getSessionUsers();

        if (!strcmp($targetMail, "all")) {
            $users->each(function ($user) {
                $this->mailService->sendUserProfile($user);
            });

            return redirect()->back();
        }
        $user = $users->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user);

        return redirect()->back();
    }

    private function getSessionUsers() {
        return collect(Session::get('users'));
    }
}
