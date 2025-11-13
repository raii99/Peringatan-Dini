<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class mahasiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nim' => '2024-10801',
            'nama' => 'Ahmad Rizki', // ganti 'name' menjadi 'nama'
            'email' => 'ahmad.rizki@example.com',
            'prodi' => 'Teknik Informatika', // pastikan 'prodi' bukan 'prodl'
            'angkat' => '2024',
            'ipk' => '3.75',
            'status' => 'Aktif',
            'alamat' => 'Jl. Contoh No. 123',
            'no_telepon' => '081234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}