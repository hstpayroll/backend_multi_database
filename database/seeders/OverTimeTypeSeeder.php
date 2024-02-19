<?php

namespace Database\Seeders;

use App\Models\OverTimeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OverTimeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OverTimeType::create([
            'name' => '1.25 Hours',
            'rate' => '1.25',
            'company_id' => '1',
        ]);
        OverTimeType::create([
            'name' => '1.5 Hours',
            'rate' => '1.5',
            'company_id' => '1',
        ]);
        OverTimeType::create([
            'name' => '1.75 Hours',
            'rate' => '1.75',
            'company_id' => '1',
        ]);
        OverTimeType::create([
            'name' => '2.0 Hours',
            'rate' => '2.0',
            'company_id' => '1',
        ]);
        OverTimeType::create([
            'name' => '2.25 Hours',
            'rate' => '2.25',
            'company_id' => '1',
        ]);
    }
}
