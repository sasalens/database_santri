<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'student_id',
        'graduation_year',
        'job',
        'contact',
        'address'
    ];

    // Relasi Many-to-1 ke Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
