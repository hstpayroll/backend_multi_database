<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(
            [
                'name' => 'IT',
            ]
        );
        Department::create(
            [
                'name' => 'Accounting',
            ]
        );
    }
}
