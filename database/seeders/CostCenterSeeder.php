<?php

namespace Database\Seeders;

use App\Models\Tenant\CostCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CostCenter::create([
            'code' => '1001',
            'description' => 'cost center one'
        ]);
        CostCenter::create([
            'code' => '1002',
            'description' => 'cost center two'
        ]);
    }
}
