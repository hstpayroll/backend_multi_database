<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Position::create([
            'name' => 'Position 1',
            'company_id' => 1,
            'sub_department_id' => 1
        ]);
       Position::create([
            'name' => 'Position 2',
            'company_id' => 1,
            'sub_department_id' => 1
        ]);
    }
}
