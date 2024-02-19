<?php

namespace Database\Seeders;

use App\Models\MainAllowance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainAllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainAllowance::create([
        'name' => 'Hardship Allowance',
        'description' => 'Hardship Allowance description',
        ]);
    }
}
