<?php

namespace Database\Seeders;

use App\Models\EmployeePension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeePensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeePension::create([
            'name' => 'Pension 1',
            'description' => 'Pension 1 description',
            'rate' => 55.00,
            'start_date' => '2010-01-01',
            'end_date' => '2021-01-01',
        ]);
    }
}
