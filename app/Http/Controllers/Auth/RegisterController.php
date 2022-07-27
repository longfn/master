<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/email/verify';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'] ?? '',
            'school_id' => $data['school_id'] ?? null,
            'type' => $data['type'] ?? User::TYPE['admin'],
            'parent_id' => $data['parent_id'] ?? 0,
            'verified_at' => null,
            'closed' => false,
            'code' => $data['code'] ?? null,
            'social_type' => $data['social_type'] ?? 0,
            'social_id' => $data['social_id'] ?? null,
            'social_name' => $data['social_name'] ?? '',
            'social_nickname' => $data['social_nickname'] ?? '',
            'social_avatar' => $data['social_avatar'] ?? 'https://fakeimg.pl/300/',
            'description' => $data['description'] ?? '',
        ]);
    }
}
