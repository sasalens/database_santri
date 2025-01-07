<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentGuardian;
use App\Models\StudentEducation;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = Student::with('guardian', 'educations')->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $guardians = StudentGuardian::all(); // Fetch available guardians
        return view('admin.students.create', compact('guardians'));
    }


    /**
     * Store a newly created student in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
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

        // Menyimpan data santri
        $student = Student::create([
            'full_name' => $validatedData['full_name'],
            'nickname' => $validatedData['nickname'] ?? null,
            'gender' => $validatedData['gender'],
            'birth_date' => $validatedData['birth_date'],
            'birth_place' => $validatedData['birth_place'],
            'address' => $validatedData['address'],
            'national_id' => $validatedData['national_id'] ?? null,
            'religion' => $validatedData['religion'] ?? 'Islam', // Default ke 'Islam'
            'status' => $validatedData['status'],
            'photo' => $filePath,
            'guardian_id' => $validatedData['guardian_id'] ?? null,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.students.index')->with('success', 'Data Berhasil Disimpan!');
    }



    /**
     * Display the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\View\View
     */
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\View\View
     */
    public function edit(Student $student)
    {
        $guardians = StudentGuardian::all(); // Fetch available guardians
        return view('admin.students.edit', compact('student', 'guardians'));
    }


    /**
     * Update the specified student in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
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

        // Ambil data santri berdasarkan ID
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

        // Update data santri
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

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.students.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
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
