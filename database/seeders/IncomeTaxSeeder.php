<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\IncomeTax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncomeTaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "Exempted",
            'min_income' => 0,
            'max_income' => 600,
            'tax_rate' => 0,
            'deduction' => 0,

        ]);
        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "601-1650",
            'min_income' => 601,
            'max_income' => 1650,
            'tax_rate' => 10,
            'deduction' => 60,

        ]);

        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "1651-3200",
            'min_income' => 1651,
            'max_income' => 3200,
            'tax_rate' => 15,
            'deduction' => 142.50,

        ]);

        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "3201-5250",
            'min_income' => 3201,
            'max_income' => 5250,
            'tax_rate' => 20,
            'deduction' => 302.00,

        ]);

        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "5251-7800",
            'min_income' => 5251,
            'max_income' => 7800,
            'tax_rate' => 25,
            'deduction' => 565.00,

        ]);

        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "7801-10900",
            'min_income' => 7801,
            'max_income' => 10900,
            'tax_rate' => 30,
            'deduction' => 955.00,

        ]);

        IncomeTax::create([
            'payroll_name_id' => 1,
            'name' => "10901- ...",
            'min_income' => 10900,
            'max_income' => null,
            'tax_rate' => 35,
            'deduction' => 1500.00,

        ]);
    }
}
