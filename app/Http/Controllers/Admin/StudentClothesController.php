<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClothes;

class StudentClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $clothes = StudentClothes::with('student')
                    ->when($query, function ($queryBuilder) use ($query) {
                        return $queryBuilder->whereHas('student', function ($q) use ($query) {
                            $q->where('full_name', 'like', '%' . $query . '%')
                            ->orWhere('shirt_size', 'like', '%' . $query . '%')
                            ->orWhere('pants_size', 'like', '%' . $query . '%')
                            ->orWhere('head_size', 'like', '%' . $query . '%')
                            ->orWhere('shoe_size', 'like', '%' . $query . '%');
                        });
                    })
                    ->get();

        return view('admin.student_clothes.index', compact('clothes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::doesnthave('clothes')->get();
        return view('admin.student_clothes.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_clothes,student_id',
            'shirt_size' => 'nullable|string|max:10',
            'pants_size' => 'nullable|string|max:10',
            'head_size' => 'nullable|string|max:10',
            'shoe_size' => 'nullable|string|max:10',
            'others'     => 'nullable|string|max:255',
        ]);

        $studentClothes = StudentClothes::create($validatedData);

        return redirect()->route('admin.student_clothes.index')->with('success', 'Data Berhasil Disimpan!');
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
        $cloth =  StudentClothes::findOrFail($id);
        $students = Student::all();

        return view('admin.student_clothes.edit', compact('cloth', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_clothes,student_id,' .$id ,
            'shirt_size' => 'nullable|string|max:10',
            'pants_size' => 'nullable|string|max:10',
            'head_size' => 'nullable|string|max:10',
            'shoe_size' => 'nullable|string|max:10',
            'others'     => 'nullable|string|max:255',
        ]);

        $cloth = StudentClothes::findOrFail($id);

        $cloth->update([
            'student_id' => $request['student_id'],
            'shirt_size' => $request['shirt_size'],
            'pants_size' => $request['pants_size'],
            'head_size' => $request['head_size'],
            'shoe_size' => $request['shoe_size'],
            'others' => $request['others'],
        ]);

        return redirect()->route('admin.student_clothes.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cloth = StudentClothes::findOrFail($id);

        $isDeleted = $cloth->delete();

        return response()->json([
            'status' => $isDeleted ? 'success' : 'error',
        ]);
    }
}
