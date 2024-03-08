<?php

namespace Database\Seeders;

use App\Models\Tenant\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'branch one',
            'bank_id' => '1',

        ]);
        Branch::create([
            'name' => 'branch Two',
            'bank_id' => '1',

        ]);
    }
}
