<?php

namespace Database\Seeders;

use App\Models\Tenant\Deduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deduction::create([
            'name' => 'Penalities',
            'description' => 'It is employees Penalities',
        ]);
        Deduction::create([
            'name' => 'Cost-sharing',
            'description' => 'It is employees Cost-sharing',
        ]);
        Deduction::create([
            'name' => 'Social-contribution',
            'description' => 'It is Includes Edir, Red-cross and other contribution',
        ]);
    }
}
