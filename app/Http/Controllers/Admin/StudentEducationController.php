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
        $students = Student::doesntHave('educations')->get();
        return view('admin.student_education.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_educations,student_id',
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
            'graduation_year' => $validatedData['graduation_year'],
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
        $education = StudentEducation::findOrFail($id); // Ambil data pendidikan berdasarkan ID
        $students = Student::all(); // Ambil semua data siswa untuk dropdown
        return view('admin.student_education.edit', compact('education', 'students'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_educations,student_id,',
            'education_level' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'entry_year' => 'required|digits:4',
            'graduation_year' => 'nullable|digits:4',
            'graduation_status' => 'required|in:Lulus,Tidak Lulus,Belum Lulus',
        ]);

        $education = StudentEducation::findOrFail($id);

        $education->update([
            'student_id' => $request['student_id'],
            'education_level' => $request['education_level'],
            'class' => $request['class'],
            'entry_year' => $request['entry_year'],
            'graduation_year' => $request['graduation_year'],
            'graduation_status' => $request['graduation_status'],
        ]);

        return redirect()->route('admin.student_education.index')->with('success', 'Data Berhasil Diupdate!');
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
