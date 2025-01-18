<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentGuardian;
use App\Models\StudentEducation;
use App\Models\StudentHealthRecord;
use App\Models\StudentMemorization;
use App\Models\StudentClothes;


class StudentController extends Controller
{
    // index
    public function index()
    {
        $students = Student::with('education')->get();
        return view('admin.students.index', compact('students'));
    }

    // create
    public function create()
    {
        $students = Student::all();
        return view('admin.students.create', compact('students'));
    }


    // store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'address' => 'required|string|max:500',
            'status' => 'required|string|in:Aktif,Alumni',
            'nickname' => 'nullable|string|max:50',
            'national_id' => 'nullable|string|max:20',
            'religion' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'guardian_id' => 'nullable|exists:student_guardians,id',
        ]);

        // Menangani upload foto jika ada
        $filePath = null;
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('photos', 'public');
            if (!$filePath) {
                return redirect()->back()->with('error', 'Upload foto gagal!');
            }
        }

        $student = Student::create([
            'full_name' => $validatedData['full_name'],
            'nickname' => $validatedData['nickname'] ?? null,
            'gender' => $validatedData['gender'],
            'birth_date' => $validatedData['birth_date'],
            'birth_place' => $validatedData['birth_place'],
            'address' => $validatedData['address'],
            'national_id' => $validatedData['national_id'] ?? null,
            'religion' => $validatedData['religion'] ?? 'Islam',
            'status' => $validatedData['status'],
            'photo' => $filePath,
            'guardian_id' => $validatedData['guardian_id'] ?? null,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Data Berhasil Disimpan!');
    }



    // detail
    public function show(Student $student)
    {
        $guardians = StudentGuardian::all();
        $education = StudentEducation::all();
        $healthrecord = StudentHealthRecord::all();
        $memorization = StudentMemorization::all();
        $cloth = StudentClothes::all();
        return view('admin.students.show', compact('student', 'guardians', 'education', 'healthrecord', 'memorization', 'cloth'));
    }

    // detail
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }


    // update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'address' => 'required|string|max:500',
            'status' => 'required|string|in:Aktif,Alumni',
            'nickname' => 'nullable|string|max:50',
            'national_id' => 'nullable|string|max:20',
            'religion' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'guardian_id' => 'nullable|exists:student_guardians,id',
        ]);

        $student = Student::findOrFail($id);

        // Menangani upload foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            // Simpan foto baru
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $student->update([
            'full_name' => $validatedData['full_name'],
            'nickname' => $validatedData['nickname'] ?? $student->nickname,
            'gender' => $validatedData['gender'],
            'birth_date' => $validatedData['birth_date'],
            'birth_place' => $validatedData['birth_place'],
            'address' => $validatedData['address'],
            'national_id' => $validatedData['national_id'] ?? $student->national_id,
            'religion' => $validatedData['religion'] ?? $student->religion,
            'status' => $validatedData['status'],
            'photo' => $validatedData['photo'] ?? $student->photo,
            'guardian_id' => $validatedData['guardian_id'] ?? null,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    
    // hapus
    public function destroy($id)
    {
        // Ambil data santri berdasarkan ID
        $student = Student::findOrFail($id);

        // Hapus file foto jika ada
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        // Hapus data santri
        $isDeleted = $student->delete();

        return response()->json([
            'status' => $isDeleted ? 'success' : 'error',
        ]);
    }


}
