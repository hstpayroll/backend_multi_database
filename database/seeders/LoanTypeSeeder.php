<?php

namespace Database\Seeders;

use App\Models\Tenant\LoanType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoanType::create([
            'name' => 'Staff Loan',
            'rate' => '0',
        ]);
        LoanType::create([
            'name' => 'Advance Loan',
            'rate' => '0',
        ]);
    }
}
