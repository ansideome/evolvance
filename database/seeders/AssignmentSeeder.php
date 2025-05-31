<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assignment::create([
            'week_id' => 1,
            'description' => 'Buat project todo app pakai Laravel',
            'due_date' => now()->addWeek()
        ]);
    }
}
