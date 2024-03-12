<?php

namespace Database\Seeders;

use App\Models\Tenant\Loan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loan::create([
            'employee_id' => 1,
            'loan_type_id' => 1,
            'name' => "Sample Loan 2",
            'amount' => 5000.00,
            'start_date' => now(),
            'expected_end_date' => now()->addMonths(6),
            'duration_months' => 6,
            'description' => 'Sample description',
            'status' => 1,
            'termination_date' => null,
        ]);
    }
}
