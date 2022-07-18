<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\MailRequest;
use App\Services\MailService;

class UserController extends Controller
{
    public function __construct() {
        $this->mailService = new MailService;
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

    public function getMailForm() {
        return view('admin.user.sendmail', [
            'users' => Session::get('user'),
        ]);
    }

    public function sendMail(MailRequest $request)
    {
        $input = $request->validated();
        $targetMail = $input['mail'];
        $users = Session::get('user');
        if (!strcmp($targetMail, "all")) {
            foreach($users as $user) {
                $this->mailService->sendConfirmation($user);
            }
        } else {
            $user = collect($users)->firstWhere('email', $targetMail);
            $this->mailService->sendConfirmation($user);
        }
        return view('admin.user.index', [
            'users' => Session::get('user'),
        ]);
    }
}
