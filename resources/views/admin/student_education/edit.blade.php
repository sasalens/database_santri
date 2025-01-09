@extends('layouts.app', ['title' => 'Edit Data Pendidikan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-bold text-gray-700">Edit Data Pendidikan Santri</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.student_education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Nama Santri -->
                    <div>
                        <label for="student_id" class="text-gray-700 mb-2 block">Nama Santri</label>
                        <select id="student_id" 
                                name="student_id" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100 select2">
                            @foreach ($students as $student)
                            <option value="{{ $student->id }}" 
                                    {{ old('student_id', $education->student_id ?? '') == $student->id ? 'selected' : '' }}>
                                {{ $student->full_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenjang Pendidikan -->
                    <div>
                        <label for="education_level" class="text-gray-700">Jenjang Pendidikan</label>
                        <select name="education_level" 
                                id="education_level" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100">
                            <option value="" disabled selected>Pilih Jenjang</option>
                            <option value="Ibtidaiyah" {{ old('education_level', $education->education_level ?? '') == 'Ibtidaiyah' ? 'selected' : '' }}>Ibtidaiyah</option>
                            <option value="Tsanawiyah" {{ old('education_level', $education->education_level ?? '') == 'Tsanawiyah' ? 'selected' : '' }}>Tsanawiyah</option>
                            <option value="Aliyah" {{ old('education_level', $education->education_level ?? '') == 'Aliyah' ? 'selected' : '' }}>Aliyah</option>
                        </select>
                        @error('education_level')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label for="class" class="text-gray-700">Kelas</label>
                        <input type="text" 
                               name="class" 
                               value="{{ old('class', $education->class) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Kelas" 
                               required minlength="3">
                        @error('class')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tahun masuk -->
                    <div>
                        <label for="entry_year" class="text-gray-700">Tahun Masuk</label>
                        <input type="number" 
                               name="entry_year" 
                               value="{{ old('entry_year', $education->entry_year) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Tahun Masuk" 
                               required minlength="3">
                        @error('entry_year')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tahun Lulus -->
                    <div>
                        <label for="graduation_year" class="text-gray-700">Tahun Lulus</label>
                        <input type="number" 
                               name="graduation_year" 
                               value="{{ old('graduation_year', $education->graduation_year) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Tahun Lulus">
                        @error('graduation_year')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="graduation_status" class="text-gray-700">Status</label>
                        <select name="graduation_status" 
                                id="graduation_status" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Lulus" {{ old('graduation_status', $education->graduation_status ?? '') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                            <option value="Belum Lulus" {{ old('graduation_status', $education->graduation_status ?? '') == 'Belum Lulus' ? 'selected' : '' }}>Belum Lulus</option>
                            <option value="Tidak Lulus" {{ old('graduation_status', $education->graduation_status ?? '') == 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                        </select>
                        @error('graduation_status')
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
                    <a href="{{ route('admin.student_education.index') }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
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
    /* Style untuk Select2 single-select */
    .select2-container--default .select2-selection--single {
        background-color: #f9fafb; /* Warna latar belakang */
        border: 1px solid #4C585B; /* Warna border */
        border-radius: 0.375rem; /* Membulatkan sudut */
        padding: 0.5rem; /* Padding dalam */
        height: auto; /* Sesuaikan tinggi */
        transition: border-color 0.2s ease-in-out;
    }

    /* Saat elemen mendapatkan fokus */
    .select2-container--default .select2-selection--single:focus {
        border-color: #3b82f6; /* Warna border saat aktif */
        outline: none; /* Hilangkan outline default */
    }

    /* Placeholder di dropdown */
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6b7280; /* Warna placeholder */
        font-style: italic;
    }

    /* Teks yang dipilih */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #374151; /* Warna teks */
        font-size: 1rem; /* Ukuran font */
        font-weight: 400; /* Ketebalan font */
    }

    /* Hover efek pada dropdown */
    .select2-container--default .select2-selection--single:hover {
        border-color: #2563eb; /* Warna border saat hover */
    }

    /* Style dropdown */
    .select2-container--default .select2-dropdown {
        border-radius: 0.375rem; /* Membulatkan sudut */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Bayangan */
    }

    /* Style untuk opsi di dropdown */
    .select2-container--default .select2-results__option {
        padding: 0.5rem; /* Spasi dalam */
        font-size: 0.875rem; /* Ukuran font */
    }

    /* Hover efek pada opsi */
    .select2-container--default .select2-results__option--highlighted {
        background-color: #3b82f6; /* Warna latar saat hover */
        color: #ffffff; /* Warna teks saat hover */
    }
</style>

@endsection