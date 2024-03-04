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

            //employs
            'employee_index',
            'employee_store',
            'employee_show',
            'employee_update',
            'employee_destroy',

            //Banks
            'bank_index',
            'bank_store',
            'bank_show',
            'bank_update',
            'bank_destroy',

            // Branches
            'branch_index',
            'branch_store',
            'branch_show',
            'branch_update',
            'branch_destroy',

            // Citizenship
            'citizenship_index',
            'citizenship_store',
            'citizenship_show',
            'citizenship_update',
            'citizenship_destroy',

            // Cost Centers
            'cost_center_index',
            'cost_center_store',
            'cost_center_show',
            'cost_center_update',
            'cost_center_destroy',

            // Departments
            'department_index',
            'department_store',
            'department_show',
            'department_update',
            'department_destroy',

            // Currency
            'currency_index',
            'currency_store',
            'currency_show',
            'currency_update',
            'currency_destroy',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
