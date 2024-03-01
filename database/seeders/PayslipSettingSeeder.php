<?php

namespace Database\Seeders;

use App\Models\Tenant\PayslipSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayslipSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PayslipSetting::create(['company_id' => 1, 'name' => 'nthLeaveDays', 'description' => '	Show leave taken this month;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'annualLeave', 'description' => '	Show Annual Leave;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'netPay', 'description' => '	Show Net payroll after settlement of loans;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'net', 'description' => '	Show net payroll before settlement of loans;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'LoanSettlement', 'description' => '	Show Loan Details;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'site', 'description' => '	Show Current Site;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'position', 'description' => '	Show Position;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'department', 'description' => '	Show Department;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'OutstandingLoan', 'description' => '	Outstanding loan on payslip;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'pensionNo', 'description' => '	Show Pension;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'tinNo', 'description' => '	Show Tin Number of employee;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'absentDays', 'description' => '	Show absent days;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'hoursWorked', 'description' => '	Show hours worked;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'daysWorked', 'description' => '	Show number of days worked;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'email', 'description' => '	Show Email address of employee;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'absentDeductionFromEarning', 'description' => '	Show deduction of allowance (transport) because of absent or leave;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'employmentType', 'description' => '	Show Employment Type;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'expenses', 'description' => '	Show Company Expenses like pension on payslip;', 'value' => 1]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'publishLink', 'description' => '	Show Payslip Link after Publish;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'gender', 'description' => '	Show Gender;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'citizenship', 'description' => '	Show Citizenship;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'bank', 'description' => '	Show Bank of the employee;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'swiftCode', 'description' => '	Show Swift code of the bank;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'bankAccountNumber', 'description' => '	Show the account number;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'dateOfBirth', 'description' => '	Show date of birth of the employee;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'startDate', 'description' => '	Show employment date;', 'value' => 0]);
        PayslipSetting::create(['company_id' => 1, 'name' => 'orgID', 'description' => '	Show Employee ID;', 'value' => 0]);
    }
}
