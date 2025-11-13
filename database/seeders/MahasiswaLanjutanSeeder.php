<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaLanjutanSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            'Rina Marlina S.Kom',
            'Surya Adi Pratama',
            'Tari Wulandari S.Pd', 
            'Ujang Hermawan M.T.',
            'Vania Putri Santoso',
            'Wawan Setiawan S.E.',
            'Xena Alexandra',
            'Yoga Permana S.Si',
            'Zulkifli Rahman',
            'Aisyah Nurhaliza S.T.',
        ];

        foreach ($mahasiswas as $index => $name) {
            $email = 'mhs_' . ($index + 51) . '@example.com';
            
            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('password123'),
                    'role' => 'mahasiswa',
                ]
            );

            $this->command->info("Processed mahasiswa " . ($index + 1) . "/10: " . $name);
        }

        $this->command->info('Successfully processed 10 mahasiswa users!');
    }
}