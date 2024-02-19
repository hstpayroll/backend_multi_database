<?php

namespace Database\Seeders;


use App\Models\Tenant\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // Company::factory(50)->create();
    }
}
