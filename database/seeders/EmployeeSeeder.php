<?php

namespace Database\Seeders;

use App\Models\Tenant\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = Employee::create([
            'emp_id' => "001",
            'first_name' => "Yetimeshet",
            'father_name' => "Tadesse",
            'gfather_name' => "Eshete",
            'sex' => "1",
            'birth_date' => "12/12/2000",
            'hired_date' => "12/12/2000",
            'tin_no' => "12345",
            'cost_center' => "205",
            'tax_region_id' => "1",
            'grade_id' => "1",
            'department_id' => "1",
            'sub_department_id' => "1",
            'position_id' => "1",
            'employment_type_id' => "1",
            'citizenship_id' => "1",
            'email' => "yetim@tadesse.com",
            'bank_id' => "1",
            'account_number' => "136547",
            'image' => "12",
            'status' => "1",
            'comment' => "The commnet here"
        ]);

        Employee::create([
            'emp_id' => "002",
            'first_name' => "Ermias",
            'father_name' => "Tadesse",
            'gfather_name' => "Kassahun",
            'sex' => "1",
            'birth_date' => "1/11/2012",
            'hired_date' => "1/12/2012",
            'tin_no' => "54321",
            'cost_center' => "205",
            'tax_region_id' => "1",
            'grade_id' => "1",
            'department_id' => "1",
            'sub_department_id' => "1",
            'position_id' => "1",
            'employment_type_id' => "1",
            'citizenship_id' => "1",
            'email' => "ermim@tadesse.com",
            'bank_id' => "1",
            'account_number' => "136547",
            'image' => "12",
            'status' => "1",
            'comment' => "The commnet here"

        ]);
    }
}
