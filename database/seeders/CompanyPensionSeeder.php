<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\CompanyPension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
