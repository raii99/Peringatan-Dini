<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AutoLoginCommand extends Command
{
    protected $signature = 'login:prodi-ti';
    protected $description = 'Auto login untuk Prodi TI';

    public function handle()
    {
        $user = User::where('email', 'prodi_ti@example.com')->first();
        
        if ($user) {
            Auth::login($user);
            $this->info('✅ Login berhasil!');
            $this->info('👤 User: ' . $user->name);
        } else {
            $this->error('❌ User tidak ditemukan');
        }
        
        return 0;
    }
}