<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Week::create([
            'bootcamp_id' => 1,
            'week_number' => 1,
            'start_date' => now(),
            'end_date' => now()->addWeek(),
        ]);
    }
}
