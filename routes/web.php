<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentClothes;
use App\Models\StudentHealthRecord;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

/**
 * route for admin
 */

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function() {

        //route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        
        //route resource santri
        Route::resource('/students', StudentController::class,['as' => 'admin']);

        //route resource wali santri
        Route::resource('/student_guardian', StudentGuardianController::class,['as' => 'admin']);

        //route resource pendidikan santri
        Route::resource('/student_education', StudentEducationController::class,['as' => 'admin']);

        //route resource hafalan santri
        Route::resource('/student_memorization', StudentMemorizationController::class,['as' => 'admin']);

        //route resource kesehatan santri
        Route::resource('/student_health_record', StudentHealthRecordController::class,['as' => 'admin']);

        //route resource kesehatan santri
        Route::resource('/student_clothes', StudentClothesController::class,['as' => 'admin']);

    });
});