<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\DeductionTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeductionTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DeductionTransaction::create([
        //     'payroll_period_id' => 1,
        //     'employee_id' => 1,
        //     'deduction_id' => 1,
        //     'amount_deducted' => 2000,
        //     'outstanding_amount' => 100,
        // ]);
        // DeductionTransaction::create([
        //     'payroll_period_id' => 1,
        //     'employee_id' => 1,
        //     'deduction_id' => 1,
        //     'amount_deducted' => 1000,
        //     'outstanding_amount' => 100,
        // ]);
    }
}
