<?php

namespace Database\Seeders;

use App\Models\Tenant\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Currency::create([
           'code' => 'ETB',
           'name' => 'Ethiopian Birr',
       ]);
       Currency::create([
           'code' => 'USD',
           'name' => 'US Dollar',
       ]);
    }
}
