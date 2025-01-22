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
        $totalStudents = Student::where('status', 'Aktif')->count();
        $totalAlumni = Student::where('status', 'Alumni')->count();
        $totalGuardian = StudentGuardian::count();

        // Kirim data ke view
        return view('admin.dashboard.index', compact(
            'totalStudents',
            'totalAlumni',
            'totalGuardian',
        ));
    }
}