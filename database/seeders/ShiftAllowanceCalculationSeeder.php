<?php

namespace Database\Seeders;

use App\Models\Tenant\ShiftAllowanceCalculation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftAllowanceCalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShiftAllowanceCalculation::create([
            'shift_allowance_type_id' => 1,
            'employee_id' => 1,
            'payroll_period_id' => 1,
            'value' => 100,
        ]);
        ShiftAllowanceCalculation::create([
            'shift_allowance_type_id' => 2,
            'employee_id' => 1,
            'payroll_period_id' => 1,
            'value' => 200,
        ]);
        ShiftAllowanceCalculation::create([
            'shift_allowance_type_id' => 3,
            'employee_id' => 1,
            'payroll_period_id' => 1,
            'value' => 300,
        ]);
        ShiftAllowanceCalculation::create([
            'shift_allowance_type_id' => 4,
            'employee_id' => 1,
            'payroll_period_id' => 1,
            'value' => 400,
        ]);
    }
}
