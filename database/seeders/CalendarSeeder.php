<?php

namespace Database\Seeders;

use App\Models\Tenant\Calendar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Calendar::create([
            'name' => 'Ethiopian Calender',
        ]);
        Calendar::create([
            'name' => 'Gregorian Calender',
        ]);
    }
}
