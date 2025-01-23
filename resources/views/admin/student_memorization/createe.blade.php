@extends('layouts.app', ['title' => 'Tambah Data Hafalan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold text-gray-700">Tambah Data Hafalan Santri</h2>
            </div>
            <hr class="mt-4">

            <form action="{{ route('admin.student_memorization.storee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

                    <!-- Total Juz -->
                    <div>
                        <label for="total_juz" class="text-gray-700">Total Juz</label>
                        <input type="number" 
                               name="total_juz" 
                               value="{{ old('total_juz') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Total Juz" 
                               required>
                        @error('total_juz')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="last_updated" class="text-gray-700">Tanggal</label>
                        <input type="date" 
                               name="last_updated" 
                               value="{{ old('last_updated') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Tanggal">
                        @error('last_updated')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Santri -->
                    <div>
                        <input type="hidden" 
                               name="student_id" 
                               value="{{ request()->get('student_id') }}">
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex space-x-4">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Data
                    </button>
                    <a href="{{ route('admin.student_health_record.createe', ['student_id' => request()->get('student_id')]) }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Lewati
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</main>

@endsection
