<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $user = Auth::user();
        switch (true) {
            case $user->isAdmin():
                return '/admin';
            case $user->isStudent():
            default:
                return '/home';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect($this->redirectTo());
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
