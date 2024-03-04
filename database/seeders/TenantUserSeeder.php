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
                'branch_index', 'branch_store', 'branch_show', 'branch_update', 'branch_destroy',
                'citizenship_index', 'citizenship_store', 'citizenship_show', 'citizenship_update', 'citizenship_destroy',
                'cost_center_index', 'cost_center_store', 'cost_center_show', 'cost_center_update', 'cost_center_destroy',
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
            ]
        );
    }
}
