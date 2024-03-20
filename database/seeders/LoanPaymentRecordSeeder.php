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
            'amount_payed' => 1000000, 
            'outstanding_amount'=> 50000,
            'is_partial' =>1,
            'is_missed'=>0,
            'status' => 1,
            'created_at'=> '2024-03-15 11:16:01',
            'updated_at' => '2024-03-15 11:16:01',
        ]);
    }
}
