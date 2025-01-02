<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMemorization extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'total_juz',
        'last_updated'
    ];

    // Relasi Many-to-1 ke Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
