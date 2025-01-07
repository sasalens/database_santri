<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentEducation;

class StudentEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = StudentEducation::with('student')->get();
        return view('admin.student_education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('admin.student_education.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'education_level' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'entry_year' => 'required|digits:4',
            'graduation_year' => 'nullable|digits:4',
            'graduation_status' => 'required|in:Lulus,Tidak Lulus,Belum Lulus',
        ]);

        $education = StudentEducation::create([
            'student_id' => $validatedData['student_id'],
            'education_level' => $validatedData['education_level'],
            'class' => $validatedData['class'],
            'entry_year' => $validatedData['entry_year'],
            'graduation_year' => $validatedData['graduation_year'] ?: null,
            'graduation_status' => $validatedData['graduation_status'] 
        ]);

        return redirect()->route('admin.student_education.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = StudentEducation::findOrFail($id);

        $isDeleted = $education->delete();

        return response()->json([
            'status' => $isDeleted ? 'success' : 'error',
        ]);
    }

}
