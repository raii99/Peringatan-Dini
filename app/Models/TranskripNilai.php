<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranskripNilai extends Model
{
    use HasFactory;

    protected $table = 'transkrip_nilai';
    
    protected $fillable = [
        'mahasiswa_id',
        'kode_mk',
        'nama_mk',
        'semester',
        'sks',
        'nilai',
        'bobot',
        'huruf',
        'jumlah'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}