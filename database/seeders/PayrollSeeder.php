<?php

namespace Database\Seeders;

use App\Models\Tenant\Payroll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payroll::create([
            "employee_id" => 1,
            "payroll_period_id" => 1,
            "cost_center_id" => 1,
            "number_of_days_worked" => 26
        ]);
    }
}
