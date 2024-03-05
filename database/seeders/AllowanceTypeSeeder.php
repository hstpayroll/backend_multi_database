<?php

namespace Database\Seeders;

use App\Models\Tenant\AllowanceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllowanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AllowanceType::create([
            'main_allowance_id' => 1,
            'name' => 'Transportation Allowance one',
            'taxability' => '2', //  1 for taxable, 2 for non-taxable 3 for partially taxable 4 for tex covered by employer
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 1,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Transportation Allowance Two',
            'taxability' => 1,
            'tax_free_amount' => 0,
            'value_type' => 0,
            'status' => 1,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Housing Allowance',
            'taxability' => 3,
            'tax_free_amount' => 1000,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Housing Allowance',
            'taxability' => 4,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
    }
}
