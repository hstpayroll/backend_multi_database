<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
