<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->state([
                'name' => 'root',
                'email' => 'root@gmail.com',
                'username' => 'root',
                'password' => Hash::make('123@123'),
                'type' => User::TYPES['admin'],
                'verified_at' => now(),
            ])
            ->create();
    }
}
