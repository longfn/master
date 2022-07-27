<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        if (Auth::user()->isAdmin()) {
            return '/admin';
        }

        return '/home';
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect($this->redirectPath());
        }

        return back()->with(
            'error',
            'The provided credentials do not match our records.',
        );
    }
}
