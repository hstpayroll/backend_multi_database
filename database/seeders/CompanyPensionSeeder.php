<?php

namespace Database\Seeders;

use App\Models\CompanyPension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyPensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyPension::create([
                'name' => 'Company Pension  1',
                'description' => 'Company 1 description',
                'rate' => 11,
                'start_date' => '2010-01-01',
                'end_date' => '2021-01-01',
            ]);
    }
}
