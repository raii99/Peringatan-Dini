<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'kode_matkul',
        'nama_matkul', 
        'sks',
        'semester',
        'program_studi',
        // 'jenis' // DIHAPUS DULU
    ];

    // Relasi dengan grades
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    // Accessor untuk warna jenis mata kuliah - DISABLE DULU
    // public function getJenisColorAttribute()
    // {
    //     return $this->jenis == 'wajib' ? 'primary' : 'success';
    // }
}