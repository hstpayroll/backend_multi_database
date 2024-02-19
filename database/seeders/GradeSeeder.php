<?php

namespace Database\Seeders;

use App\Models\Tenant\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create([
            'name' => 'G',
        ]);
        Grade::create([
            'name' => 'F',
        ]);
    }
}
