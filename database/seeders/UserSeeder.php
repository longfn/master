<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(20)
            ->state(new Sequence(
                fn () => [
                    'school_id' => School::all()->random(),
                ],
            ))
            ->create();
    }
}
