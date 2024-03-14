<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\EmployeePension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'rate' => 11,
            'start_date' => '2010-01-01',
            'end_date' => '2021-01-01',
        ]);
    }
}
