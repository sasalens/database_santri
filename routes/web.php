<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentEducation;
use Illuminate\Support\Facades\Route;

/**
 * Route for admin
 */

// Group route with prefix "admin"
Route::prefix('admin')->group(function () {

    // Group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function() {

        // Route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');



        // Route alumni (custom route for alumni)
        Route::get('students/alumni', [StudentController::class, 'alumni'])->name('admin.students.alumni');

        // Route for students
        Route::resource('students', StudentController::class, ['as' => 'admin']);



        // Route createe (untuk form create wali santri)
        Route::get('student_guardian/createe', [StudentGuardianController::class, 'createe'])->name('admin.student_guardian.createe');

        // Route storee (untuk menyimpan data wali santri)
        Route::post('student_guardian/storee', [StudentGuardianController::class, 'storee'])->name('admin.student_guardian.storee');

        // Route resource untuk student_guardian
        Route::resource('student_guardian', StudentGuardianController::class, ['as' => 'admin']);



        // Route createe (untuk form create pendidikan)
        Route::get('student_education/createe', [StudentEducationController::class, 'createe'])->name('admin.student_education.createe');

        // Route storee (untuk menyimpan data pendidikan)
        Route::post('student_education/storee', [StudentEducationController::class, 'storee'])->name('admin.student_education.storee');

        // Route resource for student education
        Route::resource('student_education', StudentEducationController::class, ['as' => 'admin']);



        // Route createe (untuk form create hafalan)
        Route::get('student_memorization/createe', [StudentMemorizationController::class, 'createe'])->name('admin.student_memorization.createe');

        // Route storee (untuk menyimpan data hafalan)
        Route::post('student_memorization/storee', [StudentMemorizationController::class, 'storee'])->name('admin.student_memorization.storee');

        // Route resource for student memorization
        Route::resource('student_memorization', StudentMemorizationController::class, ['as' => 'admin']);



        // Route createe (untuk form create kesehatan)
        Route::get('student_health_record/createe', [StudentHealthRecordController::class, 'createe'])->name('admin.student_health_record.createe');

        // Route storee (untuk menyimpan data kesehatan)
        Route::post('student_health_record/storee', [StudentHealthRecordController::class, 'storee'])->name('admin.student_health_record.storee');

        // Route resource for student health record
        Route::resource('student_health_record', StudentHealthRecordController::class, ['as' => 'admin']);



        // Route createe (untuk form create pakaian)
        Route::get('student_clothes/createe', [StudentClothesController::class, 'createe'])->name('admin.student_clothes.createe');

        // Route storee (untuk menyimpan data pakaian)
        Route::post('student_clothes/storee', [StudentClothesController::class, 'storee'])->name('admin.student_clothes.storee');

        // Route resource for student clothes
        Route::resource('student_clothes', StudentClothesController::class, ['as' => 'admin']);




        // Route for profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    });
});
