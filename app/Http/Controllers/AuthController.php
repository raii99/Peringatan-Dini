<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Method untuk create user pertama (jika perlu)
    public function createFirstUser()
    {
        // Cek apakah sudah ada user
        if (User::count() === 0) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@akademik.ac.id',
                'password' => Hash::make('password123'),
                'role' => 'admin'
            ]);
            return "User admin berhasil dibuat!";
        }
        return "User sudah ada!";
    }
}