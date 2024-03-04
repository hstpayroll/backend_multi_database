<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenantUserSeeder extends Seeder
{

    public function run(): void
    {

        //user 4
        $user4 =  User::create([
            'name' => "User 4",
            'email' => "user2@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['admin']);
        $user4->givePermissionTo(['edit_profile', 'change_password']);

        //user 5
        $user5 =  User::create([
            'name' => "User 5",
            'email' => "user5@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['accountant']);
        $user5->givePermissionTo(
            [
                'edit_profile', 'change_password',
                'employee_index', 'employee_store', 'employee_show', 'employee_update', 'employee_destroy',
                'bank_index', 'bank_store', 'bank_show', 'bank_update', 'bank_destroy',
                'calendar_index', 'calendar_store', 'calendar_show', 'calendar_update', 'calendar_destroy',
                'citizenship_index', 'citizenship_store', 'citizenship_show', 'citizenship_update', 'citizenship_destroy',
                'company_index', 'company_store', 'company_show', 'company_update', 'company_destroy',
                'company-pension_index', 'company-pension_store', 'company-pension_show', 'company-pension_update', 'company-pension_destroy',
                'cost-center_index', 'cost-center_store', 'cost-center_show', 'cost-center_update', 'cost-center_destroy',
                'company-setting_index', 'company-setting_store', 'company-setting_show', 'company-setting_update', 'company-setting_destroy',
            ]
        );
    }
}
