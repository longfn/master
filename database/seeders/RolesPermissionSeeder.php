<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\RolesPermission;
use App\Models\Permission;
use App\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    public function run()
    {
        RolesPermission::factory()
            ->count(10)
            ->state(new Sequence(
                fn () => [
                    'permission_id' => Permission::all()->random(),
                    'role_id' => Role::all()->random(),
                ],
            ))
            ->create();
    }
}
