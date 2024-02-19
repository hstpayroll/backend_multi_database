<?php

namespace Database\Seeders;

use App\Models\PayrollType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
