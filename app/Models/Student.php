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
        'graduation_year',
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
    public function education()
    {
        return $this->hasOne(StudentEducation::class, 'student_id');
    }

    // Event untuk mengupdate status pendidikan saat santri menjadi alumni
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($student) {
            if ($student->isDirty('status') && $student->status === 'Alumni') {
                // Pastikan graduation_year sudah diisi secara manual sebelum mengupdate status pendidikan
                if ($student->graduation_year) {
                    $student->education()->update([
                        'graduation_status' => 'Lulus',
                        'graduation_year' => $student->graduation_year,
                    ]);
                }
            }
        });
    }

    // Relasi 1-to-1 ke hafalan
    public function memorization()
    {
        return $this->hasOne(StudentMemorization::class);
    }


}
