<?php

namespace Database\Seeders;

use App\Models\SubDepartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubDepartment::create([
            'name' => 'Sub Department 2',
            'department_id' => 1,
            'company_id' => 1
        ]);
        SubDepartment::create([
            'name' => 'Sub Depertment 2',
            'department_id' => 1,
            'company_id' => 1
        ]);
    }
}
