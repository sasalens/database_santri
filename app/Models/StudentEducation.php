<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'education_level',
        'class',
        'entry_year',
        'graduation_year',
        'graduation_status'
    ];

    // Relasi Many-to-1 ke Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

