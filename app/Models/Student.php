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
        'no_hp',
        'address',
        'national_id',
        'religion',
        'status',
        'photo',
        'guardian_id',
    ];

    // Event untuk memindahkan data ke alumni jika status berubah menjadi 'Alumni'
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($student) {
            if ($student->isDirty('status') && $student->status === 'Alumni') {
                $student->graduation_year = now(); // Menyimpan tahun kelulusan
                $student->save();
            }
        });
    }

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
    public function education()
    {
        return $this->hasOne(StudentEducation::class, 'student_id');
    }

    // Relasi 1-to-1 ke hafalan
    public function memorization()
    {
        return $this->hasOne(StudentMemorization::class);
    }


}
