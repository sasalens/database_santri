<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentGuardian;

class StudentGuardianController extends Controller
{
    // index
    public function index(Request $request)
    {
        $query = $request->input('q');

        $guardians = StudentGuardian::when($query, function ($queryBuilder) use ($query) {
                        return $queryBuilder->where('full_name', 'like', '%' . $query . '%')
                                            ->orWhere('father_name', 'like', '%' . $query . '%')
                                            ->orWhere('mother_name', 'like', '%' . $query . '%')
                                            ->orWhere('guardian_name', 'like', '%' . $query . '%');
                    })
                    ->get();

        return view('admin.student_guardian.index', compact('guardians'));
    }


    
    // create
    public function create()
    {
        $students = Student::doesnthave('guardian')->get();
        return view('admin.student_guardian.create', compact('students')); 
    }


    // store
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'father_name' => 'string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:15',
            'mother_name' => 'string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:15',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_relationship' => 'in:Orang Tua,Saudara,Paman,Bibi,Lainnya',
            'guardian_phone' => 'nullable|string|max:15',
            'address' => 'string|max:500',
            'student_id' => 'required|array', 
            'student_id.*' => 'exists:students,id', 
        ]);

        // Menyimpan data wali santri
        $guardian = StudentGuardian::create([
            'father_name' => $validatedData['father_name'] ?? null,
            'father_occupation' => $validatedData['father_occupation'] ?? null,
            'father_phone' => $validatedData['father_phone'] ?? null,
            'mother_name' => $validatedData['mother_name'] ?? null,
            'mother_occupation' => $validatedData['mother_occupation'] ?? null,
            'mother_phone' => $validatedData['mother_phone'] ?? null,
            'guardian_name' => $validatedData['guardian_name'] ?? null,
            'guardian_relationship' => $validatedData['guardian_relationship'] ?? null,
            'guardian_phone' => $validatedData['guardian_phone'] ?? null,
            'address' => $validatedData['address'] ?? null,
        ]);

        // Menyimpan relasi satu wali ke banyak santri
        if ($guardian) {
            // Update kolom `guardian_id` pada tabel `students`
            Student::whereIn('id', $validatedData['student_id'])->update(['guardian_id' => $guardian->id]);
        }

        // Redirect ke halaman index dengan pesan sukses atau gagal
        return $guardian
            ? redirect()->route('admin.student_guardian.index')->with('success', 'Data Berhasil Disimpan!')
            : redirect()->route('admin.student_guardian.index')->with('error', 'Data Gagal Disimpan!');
    }


    // create langsung
    public function createe()
    {
        $students = Student::all();
        return view('admin.student_guardian.createe', compact('students')); 
    }


    // store langsung
    public function storee(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'father_name' => 'string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:15',
            'mother_name' => 'string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:15',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_relationship' => 'in:Orang Tua,Saudara,Paman,Bibi,Lainnya',
            'guardian_phone' => 'nullable|string|max:15',
            'address' => 'string|max:500',
            'student_id' => 'required|array', 
            'student_id.*' => 'exists:students,id', 
        ]);


        // Menyimpan data wali santri
        $guardian = StudentGuardian::create([
            'father_name' => $validatedData['father_name'],
            'father_occupation' => $validatedData['father_occupation'] ?? null,
            'father_phone' => $validatedData['father_phone'] ?? null,
            'mother_name' => $validatedData['mother_name'],
            'mother_occupation' => $validatedData['mother_occupation'] ?? null,
            'mother_phone' => $validatedData['mother_phone'] ?? null,
            'guardian_name' => $validatedData['guardian_name'] ?? null,
            'guardian_relationship' => $validatedData['guardian_relationship'] ?? null,
            'guardian_phone' => $validatedData['guardian_phone'] ?? null,
            'address' => $validatedData['address'],
        ]);

        // Menyimpan relasi satu wali ke banyak santri
        if ($guardian) {
            // Update kolom `guardian_id` pada tabel `students`
            Student::whereIn('id', $validatedData['student_id'])->update(['guardian_id' => $guardian->id]);
        }

        // redirect tambah data selanjutnya
        return redirect()->route('admin.student_education.createe', ['student_id' => $validatedData['student_id'][0]])
                     ->with('success', 'Wali santri berhasil ditambahkan! Sekarang tambah data pendidikan.');
    }


    // detail
    public function show(StudentGuardian $student_guardian)
    {
        //
    }

    // edit
    public function edit(StudentGuardian $student_guardian)
    {
        $student_guardian->load('students'); // Memastikan relasi dimuat
        $allStudents = Student::all(); // Semua data santri

        return view('admin.student_guardian.edit', compact('student_guardian', 'allStudents'));
    }

    // update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'father_name' => 'string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'father_phone' => 'nullable|string|max:15',
            'mother_name' => 'string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'mother_phone' => 'nullable|string|max:15',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_relationship' => 'in:Orang Tua,Saudara,Paman,Bibi,Lainnya',
            'guardian_phone' => 'nullable|string|max:15',
            'address' => 'string|max:500',
            'student_id' => 'required|array',
            'student_id.*' => 'exists:students,id',
        ]);

        $studentguardian = StudentGuardian::findOrFail($id);

        // Update data wali santri
        $studentguardian->update([
            'father_name' => $validatedData['father_name'] ?? null,
            'father_occupation' => $validatedData['father_occupation'] ?? null,
            'father_phone' => $validatedData['father_phone'] ?? null,
            'mother_name' => $validatedData['mother_name'] ?? null,
            'mother_occupation' => $validatedData['mother_occupation'] ?? null,
            'mother_phone' => $validatedData['mother_phone'] ?? null,
            'guardian_name' => $validatedData['guardian_name'] ?? null,
            'guardian_relationship' => $validatedData['guardian_relationship'] ?? null,
            'guardian_phone' => $validatedData['guardian_phone'] ?? null,
            'address' => $validatedData['address'] ?? null,
        ]);

        Student::where('guardian_id', $studentguardian->id)->update(['guardian_id' => null]); // Set ke null dulu
        Student::whereIn('id', $validatedData['student_id'])->update(['guardian_id' => $studentguardian->id]); // Tambahkan guardian_id


        return redirect()->route('admin.student_guardian.index')->with('success', 'Data Berhasil Diperbarui!');
    }


    
    public function destroy($id)
    {
        $guardian = StudentGuardian::findOrFail($id);

        // Set kolom guardian_id di tabel students ke null
        Student::where('guardian_id', $guardian->id)->update(['guardian_id' => null]);

        $isDeleted = $guardian->delete();

        return response()->json([
            'status' => $isDeleted ? 'success' : 'error',
        ]);
    }




}
