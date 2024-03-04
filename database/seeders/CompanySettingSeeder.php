<?php

namespace Database\Seeders;

use App\Models\Tenant\CompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Pension_FullMonth',
            'description' => 'Always Start Pension on First day of the month (don start at the middle)',
            'value' => 1
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Pension_StartDays',
            'description' => 'Always Start Pension on First day of the month (don start at the middle)',
            'value' => 0
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Payroll_PayPeriodDays',
            'description' => 'No of Days in Pay Period (used for start date of new employees and end start date of leaving employees )',
            'value' => 26
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Payroll_WorkingDays',
            'description' => 'No of Working Days in Month(Used for absent calculation)',
            'value' => 26
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Leave_StartDays',
            'description' => 'Number of days entitled for the first year of service',
            'value' => 16
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Payroll_MonthlyHours',
            'description' => 'Expected hours in month (used for absent deduction)',
            'value' =>     196
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => "Payroll_MonthlyHoursOT",
            'description' => "Standard hours in month (used for overtime calculations)",
            'value' =>     208
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Leave_IncrementYears',
            'description' => 'additional years to increment annual leave',
            'value' =>     2
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Payroll_Start_Offset',
            'description' => 'Number of days to offset payroll from the regular month (use -ve for early start)',
            'value' =>     0
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Payroll_DeductTransportIfAbsent',
            'description' => 'Transport Allowance on leave or absent 1 for TRUE and 0 for False',
            'value' =>     0
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'Payroll_Calendar',
            'description' => 'Which calendar type to use 1=Ethiopian Calendar , 2=Gregorian calender,',
            'value' =>     0
        ]);
        CompanySetting::create([
            'company_id' => 1,
            'name' => 'restDaysToSkip',
            'description' => '1 for Monday , 2 for Tuesday , 3 for Wednesday, 4 for Thursday , 5 for Friday , 6 for Saturday , 7 for Sunday',
            'value' =>     7
        ]);
    }
}
