<?php

namespace App\Http\Controllers\Admin;

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

        // Route resource for student guardians
        Route::resource('student_guardian', StudentGuardianController::class, ['as' => 'admin']);

        // Route resource for student education
        Route::resource('student_education', StudentEducationController::class, ['as' => 'admin']);

        // Route resource for student memorization
        Route::resource('student_memorization', StudentMemorizationController::class, ['as' => 'admin']);

        // Route resource for student health record
        Route::resource('student_health_record', StudentHealthRecordController::class, ['as' => 'admin']);

        // Route resource for student clothes
        Route::resource('student_clothes', StudentClothesController::class, ['as' => 'admin']);

        // Route for profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
    });
});
