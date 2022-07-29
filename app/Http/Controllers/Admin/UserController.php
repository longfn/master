<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\SendMailUserProfileRequest;
use App\Models\User;
use App\Services\MailService;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all(),
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
            'users' => $this->getSessionUsers(),
        ]);
    }

    public function getMailForm()
    {
        return view('admin.user.form-send-mail', [
            'users' => $this->getSessionUsers(),
        ]);
    }

    public function sendMail(SendMailUserProfileRequest $request)
    {
        $targetMail = $request->validated()['mail'];
        $fileAttached = null;
        if ($request->file('attachment')) {
            $fileAttached = $request->file('attachment');
        }
        $users = $this->getSessionUsers();

        if (!strcmp($targetMail, "all")) {
            $users->each(fn ($user) => $this->mailService->sendUserProfile($user, $fileAttached));

            return redirect()->back();
        }
        $user = $users->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user, $fileAttached);

        return redirect()->back();
    }

    private function getSessionUsers()
    {
        return collect(Session::get('users'));
    }
}
