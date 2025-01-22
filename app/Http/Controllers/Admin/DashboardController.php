<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentGuardian;

class DashboardController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $totalStudents = Student::count(); // Total santri
        $totalGuardian = StudentGuardian::count();

        // Kirim data ke view
        return view('admin.dashboard.index', compact(
            'totalStudents',
            'totalGuardian',
        ));
    }
}