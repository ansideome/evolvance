<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Submission::create([
            'assignment_id' => 1,
            'user_id' => 1,
            'file_path' => 'storage/submissions/tugas1.pdf',
            'submitted_at' => now()
        ]);
    }
}
