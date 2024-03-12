<?php

namespace Database\Seeders;

use App\Models\Tenant\AllowanceTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllowanceTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AllowanceTransaction::create([
            'payroll_period_id' => 1,
            'employee_id' => 1,
            'allowance_type_id' => 1,
            'amount' => 1000,
            'taxable_amount' => 800,
            'non_taxable_amount' => 200,
            'is_day_based' => 1,
            'number_of_date' => 5,
        ]);

        AllowanceTransaction::create([
            'payroll_period_id' => 1,
            'employee_id' => 1,
            'allowance_type_id' => 2,
            'amount' => 1500,
            'taxable_amount' => 1200,
            'non_taxable_amount' => 300,
            'is_day_based' => 0,
        ]);
    }
}
