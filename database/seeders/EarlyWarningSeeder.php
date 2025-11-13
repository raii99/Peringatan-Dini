<?php

namespace Database\Seeders;

use App\Models\EarlyWarning;
use App\Models\User;
use Illuminate\Database\Seeder;

class EarlyWarningSeeder extends Seeder
{
    public function run()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        
        foreach ($mahasiswa as $mhs) {
            // Generate data peringatan acak untuk beberapa mahasiswa
            if (rand(1, 3) == 1) { // 1/3 mahasiswa dapat peringatan
                $ips = $mhs->ipk - (rand(0, 50) / 100); // IPS sedikit lebih rendah dari IPK
                $sks_diambil = $mhs->total_sks;
                $sks_lulus = $sks_diambil - rand(0, 10);
                
                // Tentukan tingkat risiko
                if ($ips < 2.0 || $sks_lulus < $sks_diambil * 0.7) {
                    $tingkat_risiko = 'tinggi';
                    $kategori = 'Ancaman DO Akademik';
                    $rekomendasi = 'Wajib konseling dengan dosen wali dan batasi SKS maksimal 18';
                } elseif ($ips < 2.5) {
                    $tingkat_risiko = 'sedang';
                    $kategori = 'Perlu Perbaikan';
                    $rekomendasi = 'Perlu meningkatkan belajar dan mengurangi aktivitas non-akademik';
                } else {
                    $tingkat_risiko = 'rendah';
                    $kategori = 'Peringatan Ringan';
                    $rekomendasi = 'Tetap pertahankan prestasi akademik';
                }

                EarlyWarning::create([
                    'student_id' => $mhs->id,
                    'semester' => $mhs->semester,
                    'ips' => $ips,
                    'sks_diambil' => $sks_diambil,
                    'sks_lulus' => $sks_lulus,
                    'tingkat_risiko' => $tingkat_risiko,
                    'kategori' => $kategori,
                    'rekomendasi' => $rekomendasi,
                    'is_active' => true,
                ]);
            }
        }
    }
}