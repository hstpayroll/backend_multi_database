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

                // TaxRegion
                'tax_region_index',
                'tax_region_store',
                'tax_region_show',
                'tax_region_update',
                'tax_region_destroy',

                // Position
                'position_index',
                'position_store',
                'position_show',
                'position_update',
                'position_destroy',

                // PayslipSetting
                'payslip_setting_index',
                'payslip_setting_store',
                'payslip_setting_show',
                'payslip_setting_update',
                'payslip_setting_destroy',

                // PayrollType
                'payroll_type_index',
                'payroll_type_store',
                'payroll_type_show',
                'payroll_type_update',
                'payroll_type_destroy',

                // PayrollPeriod
                'payroll_period_index',
                'payroll_period_store',
                'payroll_period_show',
                'payroll_period_update',
                'payroll_period_destroy',

                // PayrollName
                'payroll_name_index',
                'payroll_name_store',
                'payroll_name_show',
                'payroll_name_update',
                'payroll_name_destroy',

                // OverTimeType
                'overtime_type_index',
                'overtime_type_store',
                'overtime_type_show',
                'overtime_type_update',
                'overtime_type_destroy',

                // MainAllowance
                'main_allowance_index',
                'main_allowance_store',
                'main_allowance_show',
                'main_allowance_update',
                'main_allowance_destroy',

                // LoanType
                'loan_type_index',
                'loan_type_store',
                'loan_type_show',
                'loan_type_update',
                'loan_type_destroy',

                // LoanPaymentRecord
                'loan_payment_record_index',
                'loan_payment_record_store',
                'loan_payment_record_show',
                'loan_payment_record_update',
                'loan_payment_record_destroy',

                // Loan
                'loan_index',
                'loan_store',
                'loan_show',
                'loan_update',
                'loan_destroy',

                // IncomeTax
                'income_tax_index',
                'income_tax_store',
                'income_tax_show',
                'income_tax_update',
                'income_tax_destroy',

                // SubDepartment
                'sub_department_index',
                'sub_department_store',
                'sub_department_show',
                'sub_department_update',
                'sub_department_destroy',
            ]
        );
    }
}
