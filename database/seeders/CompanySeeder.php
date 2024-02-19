<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Currency;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'HST',
            'currency_id' => 1,
            'calendar_id' => 1,
        ]);
        Company::create([
            'name' => 'ABC',
            'currency_id' =>2,
            'calendar_id' =>2
        ]);
        Company::factory(50)->create();
    }
}
