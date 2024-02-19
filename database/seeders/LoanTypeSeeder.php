<?php

namespace Database\Seeders;

use App\Models\LoanType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      LoanType::create([
          'name' => 'Staff Loan',
          'company_id' => '1',
          'rate' => '12',
      ]);
    }
}
