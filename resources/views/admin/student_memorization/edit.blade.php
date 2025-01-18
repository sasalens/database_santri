@extends('layouts.app', ['title' => 'Edit Data Hafalan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-semibold text-gray-700">Edit Data Hafalan {{ $memorization->student->full_name }}</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.student_memorization.update', $memorization->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

                    <!-- Nama Santri -->
                    <div>
                        <label for="student_id" class="text-gray-700">Nama Santri</label>
                        <input type="text" 
                            value="{{ $memorization->student->full_name }}" 
                            class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                            readonly>
                        <input type="hidden" name="student_id" value="{{ $memorization->student_id }}">
                    </div>

                    <!-- Total Juz -->
                    <div>
                        <label for="total_juz" class="text-gray-700">Total Juz</label>
                        <input type="number" 
                               name="total_juz" 
                               value="{{ old('total_juz', $memorization->total_juz) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Total Juz">
                        @error('total_juz')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="last_updated" class="text-gray-700">Tanggal</label>
                        <input type="date" 
                               name="last_updated" 
                               value="{{ old('last_updated', $memorization->last_updated) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Tanggal">
                        @error('last_updated')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex space-x-4">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Data
                    </button>
                    <a href="{{ route('admin.student_memorization.index') }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Batal
                    </a>
                </div>

            </form>
        </div>
        
    </div>
</main>

@endsection