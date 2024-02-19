<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\PayrollType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PayrollType::create([
            'name' => 'weekly',
        ]);
        PayrollType::create([
            'name' => 'Bi weekly',
        ]);
        PayrollType::create([
            'name' => 'Monthly',
        ]);

    }
}
