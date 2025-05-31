<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BootcampSeeder::class,
            SoftskillSeeder::class,
            WeekSeeder::class,
            MaterialSeeder::class,
            AssignmentSeeder::class,
            SubmissionSeeder::class,
            BootcampRelationSeeder::class
        ]);
    }
}
