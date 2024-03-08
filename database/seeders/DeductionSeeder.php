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
            'value' => 100,
            'status' => 1
        ]);
        Deduction::create([
            'name' => "Cost sharing for fresh graduates",
            'deduction_type_id' => 2,
            'value_type' => 1, // 0 = fixed amount, 1 = percentage
            'value' => 10,
            'status' => 1
        ]);
        Deduction::create([
            'name' => "Iddir contribution",
            'deduction_type_id' => 3,
            'value_type' => 1, // 0 = fixed amount, 1 = percentage
            'value' => 0.5,
            'status' => 1
        ]);
    }
}
