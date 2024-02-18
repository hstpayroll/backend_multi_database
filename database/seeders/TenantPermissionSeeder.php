<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'edit_profile',
            'change_password',

            'user_index',
            'user_create',
            'user_show',
            'user_update',
            'user_destroy',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
