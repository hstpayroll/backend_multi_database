<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\SalaryManagement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalaryManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalaryManagement::create([
            'employee_id' => 1,
            'reason' => "promotion",
            'old_salary' => 25000,
            'new_salary' => 28000,
            'start_date' => "2024-01-01",
            'status' => 1
        ]);
        SalaryManagement::create([
            'employee_id' => 1,
            'reason' => "promotion",
            'old_salary' => 28000,
            'new_salary' => 350000,
            'start_date' => "2024-01-01",
            'status' => 0
        ]);
    }
}
