<?php

namespace Database\Seeders;

use App\Models\Tenant\OverTimeCalculation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OverTimeCalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OverTimeCalculation::create([
            'employee_id' => 1,
            'over_time_type_id' => 1,
            'payroll_period_id' => 1,
            'ot_hour' => 8,
            'ot_value' => 3000,
            'status' => 1
        ]);
        OverTimeCalculation::create([
            'employee_id' => 1,
            'over_time_type_id' => 3,
            'payroll_period_id' => 1,
            'ot_hour' => 8,
            'ot_value' => 3000,
            'status' => 1
        ]);
        OverTimeCalculation::create([
            'employee_id' => 1,
            'over_time_type_id' => 2,
            'payroll_period_id' => 1,
            'ot_hour' => 8,
            'ot_value' => 3000,
            'status' => 1
        ]);
    }
}
