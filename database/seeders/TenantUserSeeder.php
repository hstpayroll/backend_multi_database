<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenantUserSeeder extends Seeder
{

    public function run(): void
    {
        //user 5
        $user5 =  User::create([
            'name' => "User 5",
            'email' => "user5@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole(['accountant']);
        $user5->givePermissionTo(
            [
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
                'overtime_recored_by_employee',

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
                'loans_by_employee',

                // LoanPaymentRecord
                'loan_payment_record_index',
                'loan_payment_record_store',
                'loan_payment_record_show',
                'loan_payment_record_update',
                'loan_payment_record_destroy',
                'payment_recored_by_loan',
                'loan_payment_records_by_employee',

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
                // Currency
                'currency_index',
                'currency_store',
                'currency_show',
                'currency_update',
                'currency_destroy',

                //shift Allowance
                'shift_Allowance_recored_by_employee',
                'shift_Allowance_index',
                'shift_Allowance_store',
                'shift_Allowance_show',
                'shift_Allowance_update',
                'shift_Allowance_destroy',

                'calendar_index', 'calendar_store', 'calendar_show', 'calendar_update', 'calendar_destroy',
                'citizenship_index', 'citizenship_store', 'citizenship_show', 'citizenship_update', 'citizenship_destroy',
                'company_index', 'company_store', 'company_show', 'company_update', 'company_destroy',
                'company_pension_index', 'company_pension_store', 'company_pension_show', 'company_pension_update', 'company_pension_destroy',
                'company_setting_index', 'company_setting_store', 'company_setting_show', 'company_setting_update', 'company_setting_destroy',
                'employee_pension_index', 'employee_pension_store', 'employee_pension_show', 'employee_pension_update', 'employee_pension_destroy',
                'employment_type_index', 'employment_type_store', 'employment_type_show', 'employment_type_update', 'employment_type_destroy',
                'fiscal_year_index', 'fiscal_year_store', 'fiscal_year_show', 'fiscal_year_update', 'fiscal_year_destroy',
                'grade_index', 'grade_store', 'grade_show', 'grade_update', 'grade_destroy',
                'overtime_calculation_index', 'overtime_calculation_store', 'overtime_calculation_show', 'overtime_calculation_update', 'overtime_calculation_destroy',

                //Allowance transaction with transaction by employee
                'allowance_transaction_index',
                'allowance_transaction_store',
                'allowance_transaction_show',
                'allowance_transaction_update',
                'allowance_transaction_destroy',
                'transaction_by_employee_show',
            ]
        );
    }
}
