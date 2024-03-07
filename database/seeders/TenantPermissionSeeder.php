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

            //Companies
            'company_index',
            'company_store',
            'company_show',
            'company_update',
            'company_destroy',

            //Company_pensions
            'company_pension_index',
            'company_pension_store',
            'company_pension_show',
            'company_pension_update',
            'company_pension_destroy',

            //Company_Setting
            'company_setting_index',
            'company_setting_store',
            'company_setting_show',
            'company_setting_update',
            'company_setting_destroy',

            //Employee_pensions
            'employee_pension_index',
            'employee_pension_store',
            'employee_pension_show',
            'employee_pension_update',
            'employee_pension_destroy',

            //Employement-Type
            'employment_type_index',
            'employment_type_store',
            'employment_type_show',
            'employment_type_update',
            'employment_type_destroy',

            //Fiscal Year
            'fiscal_year_index',
            'fiscal_year_store',
            'fiscal_year_show',
            'fiscal_year_update',
            'fiscal_year_destroy',

            //Grade
            'grade_index',
            'grade_store',
            'grade_show',
            'grade_update',
            'grade_destroy',


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

            //SubDepartment
            'sub_department_index',
            'sub_department_store',
            'sub_department_show',
            'sub_department_update',
            'sub_department_destroy',

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
