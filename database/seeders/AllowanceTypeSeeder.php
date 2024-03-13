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
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'review_allowance',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'security_allowance',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'relocation_allowance',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'handset_allowance',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'bonus',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'annual_leave_payment',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'sip_payment',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'staff_award_payment',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'car_allowance',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'On call @10% ',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'value' => 10,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'On call @15% ',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'value' => 15,
            'status' => 1,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Acting Allowance',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,

        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Handset allowance (Gross)',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Staff Award payment',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Hardship Allow - 30%  Non -taxable',
            'taxability' => 1,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'value' => 30,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Hardship Allow - 20%  Non -taxable',
            'taxability' => 1,
            'tax_free_amount' => 0,
            'value_type' => 1,
            'value' => 20,
            'status' => 0,
        ]);
        AllowanceType::create([
            'main_allowance_id' => 2,
            'name' => 'Car Allowance (Fringe Benefits)',
            'taxability' => 2,
            'tax_free_amount' => 0,
            'value_type' => 0,
            'status' => 0,
        ]);
    }
}
