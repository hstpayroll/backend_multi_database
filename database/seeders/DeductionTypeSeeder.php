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
            'name' => 'Loan',
            'name' => 'It is employees loan',
        ]);
        DeductionType::create([
            'name' => 'Penalities',
            'name' => 'It is employees Penalities',
        ]);
        DeductionType::create([
            'name' => 'Cost-sharing',
            'name' => 'It is employees Cost-sharing',
        ]);
        DeductionType::create([
            'name' => 'Social',
            'name' => 'It is Includes Edir, Red-cross and other contribution',
        ]);
    }
}
