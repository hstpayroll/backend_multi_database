<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
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
