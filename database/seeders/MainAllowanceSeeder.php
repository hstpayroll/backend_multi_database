<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\MainAllowance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainAllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainAllowance::create([
            'name' => 'Transportation Allowance',
            'description' => 'Transportation Allowance description',
        ]);
        MainAllowance::create([
            'name' => 'Hardship Allowance',
            'description' => 'Hardship Allowance description',
        ]);
    }
}
