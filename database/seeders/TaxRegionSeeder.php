<?php

namespace Database\Seeders;

use App\Models\TaxRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
