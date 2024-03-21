<?php

namespace Database\Seeders;

use App\Models\Tenant\Deduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deduction::create([
            'name' => "Laptop crush repayment",
            'deduction_type_id' => 1,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "Cost sharing for fresh graduates",
            'deduction_type_id' => 2,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "Iddir contribution",
            'deduction_type_id' => 3,
            'value_type' => 1, // 0 = fixed amount, 1 = percentage
            'value' => 0.5,
            'status' => 1
        ]);
        Deduction::create([
            'name' => "deduction_of_advance_paid_star_award",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "deduction_of_overpaid_motor_vehicle_tax",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "review_allowance_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "acting_allowance_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "deduction_due_to_unnoticed_resignation",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "deduction_of_overutilized_leave",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "cash_advance_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "outstanding_cash_advance",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "salary_advance_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "outstanding_salary_advance",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "outstanding_laptop_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "hardship_allowance_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
        Deduction::create([
            'name' => "outstanding_hardship_allowance_recovery",
            'deduction_type_id' => 3,
            'value_type' => 0, // 0 = fixed amount, 1 = percentage
            'status' => 1
        ]);
    }
}
