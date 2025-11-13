<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarlyWarning extends Model
{
    use HasFactory;

    protected $table = 'early_warnings';

    protected $fillable = [
        'student_id',
        'semester',
        'ips',
        'sks_diambil',
        'sks_lulus',
        'tingkat_risiko',
        'kategori',
        'rekomendasi',
        'is_active'
    ];

    protected $casts = [
        'ips' => 'decimal:2',
        'is_active' => 'boolean',
        'sks_diambil' => 'integer',
        'sks_lulus' => 'integer',
        'semester' => 'integer'
    ];

    // Relasi ke model User (mahasiswa)
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}