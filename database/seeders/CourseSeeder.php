<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $matakuliahTI = [
            // Semester 1
            ['TI101', 'Pemrograman Dasar', 3, 1],
            ['TI102', 'Matematika Diskrit', 3, 1],
            ['TI103', 'Pengantar Teknologi Informasi', 2, 1],
            ['TI104', 'Algoritma dan Struktur Data', 3, 1],
            
            // Semester 2
            ['TI201', 'Pemrograman Web', 3, 2],
            ['TI202', 'Basis Data', 3, 2],
            ['TI203', 'Sistem Operasi', 3, 2],
            ['TI204', 'Statistika dan Probabilitas', 3, 2],
            
            // Semester 3
            ['TI301', 'Pemrograman Berorientasi Objek', 3, 3],
            ['TI302', 'Jaringan Komputer', 3, 3],
            ['TI303', 'Rekayasa Perangkat Lunak', 3, 3],
            ['TI304', 'Interaksi Manusia dan Komputer', 2, 3],
            
            // Semester 4
            ['TI401', 'Pemrograman Mobile', 3, 4],
            ['TI402', 'Kecerdasan Buatan', 3, 4],
            ['TI403', 'Sistem Basis Data', 3, 4],
            ['TI404', 'Pengembangan Aplikasi Web', 3, 4],
            
            // Semester 5
            ['TI501', 'Data Mining', 3, 5],
            ['TI502', 'Keamanan Informasi', 3, 5],
            ['TI503', 'Cloud Computing', 3, 5],
            ['TI504', 'Pemrograman Game', 2, 5],
            
            // Semester 6
            ['TI601', 'Machine Learning', 3, 6],
            ['TI602', 'Internet of Things', 3, 6],
            ['TI603', 'Big Data', 3, 6],
            ['TI604', 'Manajemen Proyek TI', 2, 6],
            
            // Semester 7
            ['TI701', 'Kerja Praktek', 4, 7],
            ['TI702', 'Metodologi Penelitian', 2, 7],
            
            // Semester 8
            ['TI801', 'Tugas Akhir', 6, 8]
        ];

        // Insert mata kuliah TI (SEMENTARA tanpa jenis)
        foreach ($matakuliahTI as $mk) {
            Course::create([
                'kode_matkul' => $mk[0],
                'nama_matkul' => $mk[1],
                'sks' => $mk[2],
                'semester' => $mk[3],
                'program_studi' => 'Teknik Informatika',
                // 'jenis' => in_array($mk[3], [7, 8]) ? 'pilihan' : 'wajib' // DIHAPUS DULU
            ]);
        }

        $this->command->info('Seeder mata kuliah berhasil!');
    }
}