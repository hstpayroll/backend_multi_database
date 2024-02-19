<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\Citizenship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitizenshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Citizenship::create([
        'name' => 'Ethiopian',
     ]);
     Citizenship::create([
        'name' => 'USA',
     ]);
    }
}
