<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentHealthRecord;
use App\Models\Student;

class StudentHealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthrecords = StudentHealthRecord::with('student')->get();
        return view('admin.student_health_record.index', compact('healthrecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::doesnthave('healthRecord')->get();
        return view('admin.student_health_record.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_health_records,student_id',
            'blood_type' => 'nullable|string|max:3',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'emergency_contact' => 'nullable|string|max:255',
        ]);

        StudentHealthRecord::create($request->all());

        return redirect()->route('admin.student_health_record.index')->with('success', 'Data Berhasil Disimpan!');
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
        $healthrecord =  StudentHealthRecord::findOrFail($id);
        $students = Student::all();

        return view('admin.student_health_record.edit', compact('healthrecord', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id|unique:student_health_records,student_id,' . $id,
            'blood_type' => 'nullable|string|max:3',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'emergency_contact' => 'nullable|string|max:255',
        ]);

        $memorization = StudentHealthRecord::findOrFail($id);

        $memorization->update([
            'student_id' => $request['student_id'],
            'blood_type' => $request['blood_type'],
            'medical_history' => $request['medical_history'],
            'allergies' => $request['allergies'],
            'emergency_contact' => $request['emergency_contact'],
        ]);

        return redirect()->route('admin.student_health_record.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memorization = StudentHealthRecord::findOrFail($id);

        $isDeleted = $memorization->delete();

        return response()->json([
            'status' => $isDeleted ? 'success' : 'error',
        ]);
    }
}
