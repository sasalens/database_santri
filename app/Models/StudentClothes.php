<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClothes extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'shirt_size',
        'pants_size',
        'head_size',
        'shoe_size',
        'others'
    ];

    // Relasi Many-to-1 ke Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
