<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\MainDeduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainDeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainDeduction::create([
            'name' => 'Penalities',
            'description' => 'It is employees Penalities',
        ]);
        MainDeduction::create([
            'name' => 'Cost-sharing',
            'description' => 'It is employees Cost-sharing',
        ]);
        MainDeduction::create([
            'name' => 'Social-Contribution',
            'description' => 'It is Includes Edir, Red-cross and other contribution',
        ]);
    }
}
