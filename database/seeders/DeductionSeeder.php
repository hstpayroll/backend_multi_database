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
            'employee_id' => '1',
            'deduction_type_id' => '1',
            // 'static_amount' => '',
            'total_paid_amount' => '40000',
            'monthly_payment' => '1000',
            'status' => '1',
        ]);
        Deduction::create([
            'employee_id' => '1',
            'deduction_type_id' => '2',
            // 'static_amount' => '',
            'total_paid_amount' => '60000',
            'monthly_payment' => '1000',
            'status' => '1',
        ]);
        Deduction::create([
            'employee_id' => '1',
            'deduction_type_id' => '1',
            'static_amount' => '140',
            // 'total_paid_amount' => '',
            // 'monthly_payment' => '',
            'status' => '1',
        ]);
    }
}
