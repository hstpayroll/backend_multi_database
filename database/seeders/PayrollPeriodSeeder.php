<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\PayrollPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PayrollPeriod::create([
            'payroll_name_id' => 1,
            'payroll_type_id' => 1,
            'fiscal_year_id' => 1,
            'employee_pension_id' => 1,
            'company_pension_id' => 1,
            'name' => '2021',
            'start_date' => '2021-01-01',
            'end_date' => '2021-12-31',
            'status' => 1,
        ]);
    }
}
