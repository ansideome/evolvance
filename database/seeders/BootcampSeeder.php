<?php

namespace Database\Seeders;

use App\Models\Bootcamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bootcamp::create([
            'name' => 'Ready2Work: Soft Skill Accelerator by Nestlé',
            'image' => 'https://example.com/images-1',
            'description' => 'Telkom Future Talent Bootcamp adalah program pelatihan intensif yang dirancang untuk membentuk generasi profesional digital masa depan. Melalui kurikulum berbasis industri, peserta akan dibekali keterampilan teknologi terkini seperti cloud computing, data analytics, cybersecurity, dan digital leadership. Dipandu langsung oleh praktisi Telkom Indonesia dan mentor berpengalaman, bootcamp ini memberikan pengalaman belajar berbasis proyek nyata yang mempersiapkan peserta untuk menghadapi tantangan di dunia kerja digital. Program ini terbuka untuk mahasiswa, fresh graduate, dan profesional muda yang ingin mempercepat karier di dunia teknologi.',
            'start_date' => now(),
            'end_date' => now()->addMonths(2),
            'price' => 250000,
            'kuota' => 10,
            'tipe_pembelajaran' => 'Daring',
            'bidang_pekerjaan' => 'Teknologi',
        ]);
    }
}
