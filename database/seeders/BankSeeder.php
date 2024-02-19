<?php

namespace Database\Seeders;

use App\Models\Tenant\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::create([
            'name' => 'Commercial  Bank',
            'swift' => 'Commercial_Bank',
        ]);
        Bank::create([
            'name' => 'Nib  Bank',
            'swift' => 'Nib_Bank',
        ]);
    }
}
