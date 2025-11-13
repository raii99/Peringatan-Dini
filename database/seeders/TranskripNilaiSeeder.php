<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\TranskripNilai;

class TranskripNilaiSeeder extends Seeder
{
    public function run()
    {
        $mataKuliah = [
            // Semester 1
            ['kode' => 'IFT1201', 'nama' => 'Pendidikan Agama Islam', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFT1208', 'nama' => 'Pendidikan Kewarganegaraan', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFT1207', 'nama' => 'Bahasa Inggris Komputer', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFP1102', 'nama' => 'Praktikum Statistika Dan Probabilitas', 'semester' => 1, 'sks' => 1],
            ['kode' => 'IFT1209', 'nama' => 'Algoritma Pemrograman I', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFT1310', 'nama' => 'Pengantar Teknologi Informasi', 'semester' => 1, 'sks' => 3],
            ['kode' => 'IFT1211', 'nama' => 'Statistika Dan Probabilitas', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFT1213', 'nama' => 'Fisika', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFT1212', 'nama' => 'Matematika Informatika I', 'semester' => 1, 'sks' => 2],
            ['kode' => 'IFP1201', 'nama' => 'Praktikum Algoritma & Pemrograman I', 'semester' => 1, 'sks' => 2],
            
            // Semester 2
            ['kode' => 'IFT2218', 'nama' => 'Sistem Operasi', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFP2203', 'nama' => 'Praktikum Algoritma Dan Pemrograman 2', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFP2105', 'nama' => 'Praktikum Sistem Operasi', 'semester' => 2, 'sks' => 1],
            ['kode' => 'IFP2206', 'nama' => 'Praktikum Sistem Basis Data 1', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2216', 'nama' => 'Algoritma Dan Pemrograman 2', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2217', 'nama' => 'Struktur Data', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2221', 'nama' => 'Matematika Informatika 2', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2220', 'nama' => 'Sistem Basis Data 1', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2214', 'nama' => 'Pendidikan Pancasila', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2219', 'nama' => 'Pengantar Sistem Informasi', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFP2204', 'nama' => 'Praktikum Struktur Data', 'semester' => 2, 'sks' => 2],
            ['kode' => 'IFT2215', 'nama' => 'Bahasa Inggris Presentasi', 'semester' => 2, 'sks' => 2],
            
            // Semester 3
            ['kode' => 'IFT3223', 'nama' => 'Arsitektur dan Organisasi Komputer', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFT3228', 'nama' => 'Rekayasa Perangkat Lunak', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFP3109', 'nama' => 'Praktikum Interaksi Manusia dan Komputer', 'semester' => 3, 'sks' => 1],
            ['kode' => 'IFT3227', 'nama' => 'Interaksi Manusia dan Komputer', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFP3208', 'nama' => 'Praktikum Sistem Basis Data 2', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFP3207', 'nama' => 'Praktikum Pemrograman Berorientasi Objek', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFT3324', 'nama' => 'Teknologi Open Source', 'semester' => 3, 'sks' => 3],
            ['kode' => 'IFT3225', 'nama' => 'Pemrograman Berorientasi Objek', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFT3226', 'nama' => 'Sistem Basis Data 2', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFT3229', 'nama' => 'Matematika Informatika 3', 'semester' => 3, 'sks' => 2],
            ['kode' => 'IFT3222', 'nama' => 'Ilmu Sosial Budaya Dasar', 'semester' => 3, 'sks' => 2],
            
            // Semester 4
            ['kode' => 'IFT4232', 'nama' => 'Jaringan Komputer', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFP4210', 'nama' => 'Praktikum Sistem Multimedia', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFP4212', 'nama' => 'Praktikum Kecerdasan Buatan', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFT4335', 'nama' => 'Pengantar Temu Kembali Data dan Informasi', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFT4236', 'nama' => 'Matematika Informatika 4', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFT4230', 'nama' => 'Pendidikan Anti Korupsi', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFP4211', 'nama' => 'Praktikum Jaringan Komputer', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFT4231', 'nama' => 'Sistem Multimedia', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFT4234', 'nama' => 'Pemrograman Web', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFP4213', 'nama' => 'Praktikum Pemrograman Web', 'semester' => 4, 'sks' => 2],
            ['kode' => 'IFT4233', 'nama' => 'Kecerdasan Buatan', 'semester' => 4, 'sks' => 2],
            
            // Semester 5
            ['kode' => 'IFT5243', 'nama' => 'Pembelajaran Mesin', 'semester' => 5, 'sks' => 2],
            ['kode' => 'IFT5337', 'nama' => 'Kewirausahaan 1', 'semester' => 5, 'sks' => 3],
            ['kode' => 'IFT5241', 'nama' => 'Jaringan Syaraf Tiruan', 'semester' => 5, 'sks' => 2],
            ['kode' => 'IFP5214', 'nama' => 'Praktikum Pemrograman Perangkat Seluler', 'semester' => 5, 'sks' => 2],
            ['kode' => 'IFT5239', 'nama' => 'Bahasa Indonesia', 'semester' => 5, 'sks' => 2],
            ['kode' => 'IFT5242', 'nama' => 'Pengantar Penambangan Data', 'semester' => 5, 'sks' => 2],
        ];

        $mahasiswas = Mahasiswa::all();

        foreach ($mahasiswas as $index => $mahasiswa) {
            foreach ($mataKuliah as $mk) {
                // Berikan nilai berdasarkan kategori mahasiswa
                $nilai = $this->generateNilaiBerdasarkanKategori($index + 1, $mk['semester']);
                $konversi = $this->konversiNilai($nilai);
                
                TranskripNilai::create([
                    'mahasiswa_id' => $mahasiswa->id,
                    'kode_mk' => $mk['kode'],
                    'nama_mk' => $mk['nama'],
                    'semester' => $mk['semester'],
                    'sks' => $mk['sks'],
                    'nilai' => $nilai,
                    'bobot' => $konversi['bobot'],
                    'huruf' => $konversi['huruf'],
                    'jumlah' => $mk['sks'] * $konversi['bobot'],
                ]);
            }
        }
    }

    private function generateNilaiBerdasarkanKategori($idMahasiswa, $semester)
    {
        // Kategori berdasarkan ID mahasiswa
        if ($idMahasiswa <= 10) {
            // Berprestasi: 80-95 (A dan B)
            return rand(8000, 9500) / 100;
        } elseif ($idMahasiswa <= 20) {
            // Sedang: 70-85 (B dan C)
            return rand(7000, 8500) / 100;
        } elseif ($idMahasiswa <= 30) {
            // Waspada: 60-75 (C dan D)
            return rand(6000, 7500) / 100;
        } elseif ($idMahasiswa <= 40) {
            // Berisiko: 40-65 (D dan E)
            return rand(4000, 6500) / 100;
        } else {
            // Variasi: 50-80 (campuran)
            return rand(5000, 8000) / 100;
        }
    }

    private function konversiNilai($nilai)
    {
        // Sistem konversi sederhana: A=4, B=3, C=2, D=1, E=0
        if ($nilai >= 85) {
            return ['huruf' => 'A', 'bobot' => 4];
        } elseif ($nilai >= 70) {
            return ['huruf' => 'B', 'bobot' => 3];
        } elseif ($nilai >= 55) {
            return ['huruf' => 'C', 'bobot' => 2];
        } elseif ($nilai >= 40) {
            return ['huruf' => 'D', 'bobot' => 1];
        } else {
            return ['huruf' => 'E', 'bobot' => 0];
        }
    }
}