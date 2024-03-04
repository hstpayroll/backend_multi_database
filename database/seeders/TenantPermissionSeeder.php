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

            //Calendars
            'calendar_index',
            'calendar_store',
            'calendar_show',
            'calendar_update',
            'calendar_destroy',

            //citizenships
            'citizenship_index',
            'citizenship_store',
            'citizenship_show',
            'citizenship_update',
            'citizenship_destroy',

            //Companies
            'company_index',
            'company_store',
            'company_show',
            'company_update',
            'company_destroy',

            //Company-pensions
            'company-pensions_index',
            'company-pensions_store',
            'company-pensions_show',
            'company-pensions_update',
            'company-pensions_destroy',


        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
