<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\MailRequest;
use App\Services\MailService;

class UserController extends Controller
{
    public function __construct(MailService $mailService) {
        $this->mailService = $mailService;
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => Session::get('user'),
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $input = $request->validated();
        $collection = collect($input);
        Session::push('user', $collection);

        return view('admin.user.index', [
            'users' => Session::get('user'),
        ]);
    }

    public function getMailForm()
    {
        return view('admin.user.form-send-mail', [
            'users' => Session::get('user'),
        ]);
    }

    public function sendMail(MailRequest $request)
    {
        $targetMail = $request->validated()['mail'];
        $users = Session::get('user');
        if (!strcmp($targetMail, "all")) {
            foreach($users as $user) {
                $this->mailService->sendUserProfile($user);
            }
            return redirect()->back();
        }
        $user = collect($users)->firstWhere('email', $targetMail);
        $this->mailService->sendUserProfile($user);
        return redirect()->back();
    }
}
