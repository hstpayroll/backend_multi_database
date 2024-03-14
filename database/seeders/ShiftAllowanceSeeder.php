<?php

namespace Database\Seeders;

use App\Models\Tenant\ShiftAllowanceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftAllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShiftAllowanceType::create([
            'name' => 'Shift Allowance@10% hourly Rate',
            'rate' => 10,
        ]);
        ShiftAllowanceType::create([
            'name' => 'Shift Allowance@15% hourly Rate',
            'rate' => 15,
        ]);
        ShiftAllowanceType::create([
            'name' => 'Shift Allowance@20% hourly Rate',
            'rate' => 20,
        ]);
        ShiftAllowanceType::create([
            'name' => 'Shift Allowance@25% hourly Rate',
            'rate' => 25,
        ]);
    }
}
