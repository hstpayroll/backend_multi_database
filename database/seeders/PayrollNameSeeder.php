<?php

namespace Database\Seeders;

use App\Models\PayrollName;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PayrollName::create([
            'name' => '983/2016FederalTax Administration Proclamation',
            'start_date' => '2016-01-01',
            'end_date' => '2021-12-31',
            'details' => 'Federal Tax Administration Proclamation',
        'status' => 1,
        ]);
    }
}
