<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\FiscalYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FiscalYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FiscalYear::create([
            'name' => '2024- Budget Year',
            'start_date' => '2024/01/01',
            'end_date' => '2024/12/31',
        ]);
    }
}
