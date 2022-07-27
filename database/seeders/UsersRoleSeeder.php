<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class UsersRoleSeeder extends Seeder
{
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) {
            DB::table('users_roles')->insert([
                'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                'role_id' => Role::select('id')->orderByRaw("RAND()")->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
