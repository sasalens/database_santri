@extends('layouts.app', ['title' => 'Edit Data Hafalan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-bold text-gray-700">Edit Data Hafalan Santri</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.student_memorization.update', $memorization->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

                    <!-- Nama Santri -->
                    <div>
                        <label for="student_id" class="text-gray-700 mb-2 block">Nama Santri</label>
                        <select id="student_id" 
                                name="student_id" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300 select2" 
                                multiple>
                            @foreach ($students as $student)
                            <option value="{{ $student->id }}" 
                                    {{ old('student_id', $memorization->student_id ?? '') == $student->id ? 'selected' : '' }}>
                                {{ $student->full_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Total Juz -->
                    <div>
                        <label for="total_juz" class="text-gray-700">Total Juz</label>
                        <input type="number" 
                               name="total_juz" 
                               value="{{ old('total_juz', $memorization->total_juz) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" 
                               placeholder="Total Juz" 
                               required minlength="3">
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
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" 
                               placeholder="Tanggal">
                        @error('last_updated')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex space-x-4">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                        Simpan Data
                    </button>
                    <a href="{{ route('admin.student_memorization.index') }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300">
                        Batal
                    </a>
                </div>

            </form>
        </div>
        
    </div>
</main>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#student_id').select2({
            placeholder: "Pilih Wali Santri",
            allowClear: true,
            width: '100%' // Agar dropdown menyesuaikan dengan lebar elemen
        });
    });
</script>

<style>
    /* Tambahkan padding dan margin pada kontainer */
    .select2-container--default .select2-selection--multiple {
        background-color: #f9fafb; /* Warna latar belakang */
        border: 1px solid #4C585B; /* Warna border */
        border-radius: 0.375rem; /* Border radius agar membulat */
        padding: 0.5rem; /* Padding dalam */
        transition: border-color 0.2s ease-in-out;
    }

    /* Saat elemen mendapatkan fokus */
    .select2-container--default .select2-selection--multiple:focus {
        border-color: #3b82f6; /* Warna border saat aktif */
        outline: none; /* Hilangkan outline default */
    }

    /* Style untuk tag yang dipilih */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3b82f6; /* Warna tag */
        color: #ffffff; /* Warna teks dalam tag */
        border: none; /* Hilangkan border */
        border-radius: 0.25rem; /* Membulatkan sudut */
        padding: 0.25rem 0.5rem; /* Spasi dalam */
        margin: 0.125rem; /* Jarak antar tag */
        font-size: 0.875rem; /* Ukuran font lebih kecil */
    }

    /* Style untuk tombol hapus pada tag */
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #ffffff; /* Warna ikon hapus */
        margin-left: 0.25rem; /* Jarak ikon ke teks */
    }

    /* Hover efek pada tag */
    .select2-container--default .select2-selection--multiple .select2-selection__choice:hover {
        background-color: #2563eb; /* Warna lebih gelap saat hover */
    }
</style>

@endsection