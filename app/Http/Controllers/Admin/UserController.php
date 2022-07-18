<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\MailRequest;
use Mail;
use App\Mail\Admin\ConfirmationMail;

class UserController extends Controller
{
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
        return view('admin.user.index');
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
                $targetUser = $user;
                Mail::to($targetUser['email'])->send(new ConfirmationMail($targetUser));
            }
            if (Mail::flushMacros()) {
                return response()->json('Sorry! Please try again latter');
            } else {
                return response()->json('Great! Successfully send in your mail');
            }
        } else {
            $targetUser = collect($users)->firstWhere('email', $targetMail);
            Mail::to($targetMail)->send(new ConfirmationMail($targetUser));
            if (Mail::flushMacros()) {
                return response()->json('Sorry! Please try again latter');
            } else {
                return response()->json('Great! Successfully send in your mail');
            }
        }
    }
}
