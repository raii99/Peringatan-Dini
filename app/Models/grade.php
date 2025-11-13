<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id', 
        'tahun_akademik',
        'semester',
        'nilai_huruf',
        'bobot',
        'nilai_angka'
    ];

    // Relasi dengan student
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relasi dengan course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}