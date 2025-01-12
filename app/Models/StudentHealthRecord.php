<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHealthRecord extends Model
{
    use HasFactory;

    protected $table = 'student_health_records';

    protected $fillable = [
        'student_id',
        'blood_type',
        'medical_history',
        'allergies',
        'emergency_contact'
    ];

    // Relasi Many-to-1 ke Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}

