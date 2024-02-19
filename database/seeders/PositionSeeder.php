<?php

namespace Database\Seeders;

use App\Models\Tenant\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Position::create([
            'name' => 'Position 1',
            'sub_department_id' => 1
        ]);
       Position::create([
            'name' => 'Position 2',
            'sub_department_id' => 1
        ]);
    }
}
