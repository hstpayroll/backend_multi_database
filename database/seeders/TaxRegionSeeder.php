<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant\TaxRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaxRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxRegion::create(
            [
                'name' => 'Addis Abeba',
            ]
        );
        TaxRegion::create(
            [
                'name' => 'BahirDar',
            ]
        );
    }
}
