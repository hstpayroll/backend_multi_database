<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

            'tenant_user_index',
            'tenant_user_create',
            'tenant_user_show',
            'tenant_user_update',
            'tenant_user_destroy',

            //employes
            'employee_index',
            'employee_store',
            'employee_show',
            'employee_update',
            'employee_destroy',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
