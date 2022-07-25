<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run()
    {
        Message::factory()
            ->count(16)
            ->state(new Sequence(
                fn () => [
                    'sender_id' => User::all()->random(),
                ],
            ))
            ->create();
    }
}
