<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\LoanPaymentRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanPaymentRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoanPaymentRecord::create([
            'id' => 1,
            'Payroll_period_id' => "1",
            'loan_id' => 1,
            'amount_payed' => 10000,
            'outstanding_amount' => 9000,
            'is_partial' => 0,
            'is_missed' => 0,
            'status' => 1,
        ]);
    }
}
