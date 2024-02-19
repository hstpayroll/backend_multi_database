<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\OverTimeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        ]);
        OverTimeType::create([
            'name' => '1.5 Hours',
            'rate' => '1.5',
        ]);
        OverTimeType::create([
            'name' => '1.75 Hours',
            'rate' => '1.75',
        ]);
        OverTimeType::create([
            'name' => '2.0 Hours',
            'rate' => '2.0',
        ]);
        OverTimeType::create([
            'name' => '2.25 Hours',
            'rate' => '2.25',
        ]);
    }
}
