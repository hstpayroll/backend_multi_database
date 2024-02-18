<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'accountant']);
        $role = Role::create(['name' => 'hrm']);
        $role = Role::create(['name' => 'managment']);
    }
}
