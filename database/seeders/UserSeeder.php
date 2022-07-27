<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->state([
                'name' => 'Default Admin',
                'email' => 'admin@example.org',
                'username' => 'admin',
                'password' => Hash::make('admin365'),
                'type' => User::TYPE['admin'],
                'verified_at' => now(),
                'school_id' => null,
            ])
            ->create();
        User::factory()
            ->count(10)
            ->state(new Sequence(
                fn () => [
                    'school_id' => School::all()->random(),
                ],
            ))
            ->create();
    }
}
