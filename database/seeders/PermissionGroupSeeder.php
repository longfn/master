<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;

class PermissionGroupSeeder extends Seeder
{
    public function run()
    {
        PermissionGroup::factory()
            ->count(10)
            ->create();
    }
}
