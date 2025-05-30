<?php

namespace Database\Seeders;

use App\Models\Softskill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftskillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Softskill::insert([
            ['name' => 'Leadership'],
            ['name' => 'Etika'],
            ['name' => 'Profesionalitas'],
            ['name' => 'Manajemen Waktu'],
            ['name' => 'Problem Solving'],
            ['name' => 'Kreativitas'],
            ['name' => 'Adaptabilitas'],
            ['name' => 'Komunikasi'],
            ['name' => 'Inovasi'],
        ]);
    }
}
