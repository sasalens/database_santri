<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentMemorization;

class StudentMemorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $memorizations = StudentMemorization::with('student')
                    ->when($query, function ($queryBuilder) use ($query) {
                        return $queryBuilder->whereHas('student', function ($q) use ($query) {
                            $q->where('full_name', 'like', '%' . $query . '%')
                            ->orWhere('total_juz', 'like', '%' . $query . '%');
                        });
                    })
                    ->get();

        return view('admin.student_memorization.index', compact('memorizations'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::doesnthave('memorization')->get();
        return view('admin.student_memorization.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_memorizations,id',
            'total_juz' => 'required|integer|min:0|max:30',
            'last_updated' => 'nullable|date',
        ]);

        StudentMemorization::create($request->all());

        return redirect()->route('admin.student_memorization.index')->with('success', 'Data Berhasil Disimpan!');
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
        $memorization =  StudentMemorization::findOrFail($id);
        $students = Student::all();

        return view('admin.student_memorization.edit', compact('memorization', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_memorizations,student_id,' . $id,
            'total_juz' => 'required|integer|min:0|max:30',
            'last_updated' => 'nullable|date',
        ]);

        $memorization = StudentMemorization::findOrFail($id);

        $memorization->update([
            'student_id' => $request['student_id'],
            'total_juz' => $request['total_juz'],
            'last_updated' => $request['last_updated'],
        ]);

        return redirect()->route('admin.student_memorization.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memorization = StudentMemorization::findOrFail($id);

        $isDeleted = $memorization->delete();

        return response()->json([
            'status' => $isDeleted ? 'success' : 'error',
        ]);
    }
}
