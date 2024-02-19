<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\EmploymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            EmploymentType::create([
                'name' => 'Full Time',
            ]);

            EmploymentType::create([
                'name' => 'Part-time',
            ]);
            EmploymentType::create([
                'name' => 'Contract' ,
            ]);
            EmploymentType::create([
                'name' => 'Freelance ' ,
            ]);
            EmploymentType::create([
                'name' => 'Internship ' ,
            ]);
    }
}
