<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'mahasiswa_aktif' => 850,
            'status_waspada' => 250,
            'berisiko_tinggi' => 148,
        ];

        return view('dashboard', compact('stats'));
    }
}