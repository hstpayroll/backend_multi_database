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
            'name' => 'Acting Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Annual Lave',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Bonus',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Call Out Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Car Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Car Benefit in Kind',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Ex-gratia payment',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'fringe benefit',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Fule',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Hardship Allowance 20%',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'main allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'main allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'On Call Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Shift Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Shift Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Test Earning',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Test Earning Individual',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Transport Allowance',
            'description' => 'the description'
        ]);
        MainAllowance::create([
            'name' => 'Washing & Parking Allowance',
            'description' => 'the description'
        ]);
    }
}
