<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionGroupSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RolesPermissionSeeder::class,
            SchoolSeeder::class,
            UserSeeder::class,
            UsersRoleSeeder::class,
            TagSeeder::class,
            TaggableSeeder::class,
            AttachmentSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
