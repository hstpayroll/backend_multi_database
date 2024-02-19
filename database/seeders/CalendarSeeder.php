<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
