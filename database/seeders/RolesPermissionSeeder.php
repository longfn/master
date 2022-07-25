<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) {
            DB::table('roles_permissions')->insert([
                'permission_id' => Permission::select('id')->orderByRaw("RAND()")->first()->id,
                'role_id' => Role::select('id')->orderByRaw("RAND()")->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
