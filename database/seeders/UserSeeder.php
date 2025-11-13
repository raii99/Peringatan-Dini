<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Program Studi TI',
            'email' => 'prodi_ti@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // Tambahkan user lain jika perlu
        User::create([
            'name' => 'Dosen Contoh',
            'email' => 'dosen@example.com',
            'password' => Hash::make('password123'),
            'role' => 'dosen'
        ]);
    }
}