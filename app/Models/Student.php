<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'nickname',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'national_id',
        'religion',
        'status',
        'photo',
        'guardian_id',
    ];

    // Relasi 1-to-1 ke pakaian
    public function clothes()
    {
        return $this->hasOne(StudentClothes::class);
    }

    // Relasi many-to-1 ke wali santri
    public function guardian()
    {
        return $this->belongsTo(StudentGuardian::class, 'guardian_id', 'id');
    }

    // Relasi 1-to-1 ke catatan kesehatan
    public function healthRecord()
    {
        return $this->hasOne(StudentHealthRecord::class);
    }

    // Relasi 1-to-Many ke pendidikan
    public function educations()
    {
        return $this->hasMany(StudentEducation::class);
    }

    // Relasi 1-to-1 ke hafalan
    public function memorization()
    {
        return $this->hasOne(StudentMemorization::class);
    }

    // Relasi 1-to-1 ke alumni (jika statusnya alumni)
    public function alumnus()
    {
        return $this->hasOne(Alumnus::class);
    }


}
