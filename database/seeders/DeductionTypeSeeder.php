<?php

namespace Database\Seeders;

use App\Models\Tenant\DeductionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeductionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeductionType::create([
            'main_deduction_id' => '1',
            'name' => 'laptop crush',
            'description' => 'the hp laptop fun is not working',
            'is_continuous' => '1',
            'is_employee_specific' => '1',
            'value_type' => null, // Set to null instead of an empty string
            'value' => null, // Set to null instead of an empty string
        ]);
        DeductionType::create([
            'main_deduction_id' => '2',
            'name' => 'Educational Cost-Sharing',
            'description' => 'university coast sharing',
            'is_continuous' => '1',
            'is_employee_specific' => '1',
        ]);
        DeductionType::create([
            'main_deduction_id' => '3',
            'name' => 'Edir',
            'description' => 'social-contribution type',
            'is_continuous' => '0',
            'is_employee_specific' => '0',
            'value_type' => '0',
            'value' => '140'
        ]);
    }
}
