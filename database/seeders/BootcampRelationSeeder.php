<?php

namespace Database\Seeders;

use App\Models\Bootcamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BootcampRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bootcamp = Bootcamp::first();
        $bootcamp->softskills()->attach([1, 2, 3]);
    }
}
