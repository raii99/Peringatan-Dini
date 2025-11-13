<?php

namespace App\Http\Controllers;

use App\Models\EarlyWarning;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeringatanController
{
    public function index()
    {
        $user = Auth::user();
        $programStudi = $user->program_studi;

        // Ambil peringatan aktif berdasarkan program studi
        $peringatan = EarlyWarning::with('student')
            ->whereHas('student', function($query) use ($programStudi) {
                $query->where('program_studi', $programStudi);
            })
            ->where('is_active', true)
            ->orderBy('tingkat_risiko', 'desc')
            ->orderBy('ips', 'asc')
            ->get();

        $stats = [
            'total' => $peringatan->count(),
            'tinggi' => $peringatan->where('tingkat_risiko', 'tinggi')->count(),
            'sedang' => $peringatan->where('tingkat_risiko', 'sedang')->count(),
            'rendah' => $peringatan->where('tingkat_risiko', 'rendah')->count(),
        ];

        return view('peringatan.index', compact('peringatan', 'stats', 'user'));
    }
}