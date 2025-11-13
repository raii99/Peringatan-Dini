<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_matkul',  // Sesuai migration
        'nama_matkul',  // Sesuai migration  
        'sks', 
        'semester', 
        'jenis', 
        'program_studi'
    ];

    // Relasi dengan grades
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function getJenisColorAttribute()
    {
        return $this->jenis == 'wajib' ? 'primary' : 'success';
    }
}