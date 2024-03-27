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
            'name' => 'Equipment lost Penalitie',
            'description' => 'computer (laptop) fun damage',
            'is_continuous' => '1',
            'is_employee_specific' => '1',
            // 'value_type' => '',
            // 'value' => '',
            'status' => '1',
        ]);
        DeductionType::create([
            'main_deduction_id' => '2',
            'name' => 'educational cost-shatring',
            'description' => 'computer (laptop) fun damage',
            'is_continuous' => '1',
            'is_employee_specific' => '1',
            // 'value_type' => '',
            // 'value' => '',
            'status' => '1',
        ]);
        DeductionType::create([
            'main_deduction_id' => '3',
            'name' => 'Edir',
            'description' => 'social-contribution',
            'is_continuous' => '0',
            'is_employee_specific' => '0',
            'value_type' => '0',
            'value' => '30',
            'status' => '1',
        ]);
    }
}
