@extends('layouts.app', ['title' => 'Edit Data Pakaian Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-bold text-gray-700">Edit Data Pakaian Santri</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.student_clothes.update', $cloth->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

                    <!-- Nama Santri -->
                    <div>
                        <label for="student_id" class="text-gray-700 mb-2 block">Nama Santri</label>
                        <select id="student_id" 
                                name="student_id" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100 select2">
                            <option value="" selected disabled>Pilih Santri</option>
                            @foreach ($students as $student)
                            <option value="{{ $student->id }}" 
                                    {{ old('student_id', $cloth->student_id ?? '') == $student->id ? 'selected' : '' }}>
                                {{ $student->full_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ukuran Baju -->
                    <div>
                        <label for="shirt_size" class="text-gray-700">Ukuran Baju</label>
                        <select name="shirt_size" 
                                id="shirt_size" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100">
                            <option value="" disabled selected>Pilih Ukuran Baju</option>
                            <option value="XS" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'XS' ? 'selected' : '' }}>XS</option>
                            <option value="S" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'S' ? 'selected' : '' }}>S</option>
                            <option value="M" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'M' ? 'selected' : '' }}>M</option>
                            <option value="L" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XL" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'XL' ? 'selected' : '' }}>XL</option>
                            <option value="XXL" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'XXL' ? 'selected' : '' }}>XXL</option>
                            <option value="XXXL" {{ old('shirt_size', $cloth->shirt_size ?? '') == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                        </select>
                        @error('shirt_size')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ukuran Celana -->
                    <div>
                        <label for="pants_size" class="text-gray-700">Ukuran Celana</label>
                        <input type="number" 
                               name="pants_size" 
                               value="{{ old('pants_size', $cloth->pants_size) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Ukuran Celana">
                        @error('pants_size')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ukuran Kepala -->
                    <div>
                        <label for="head_size" class="text-gray-700">Ukuran Kepala</label>
                        <input type="number" 
                               name="head_size" 
                               value="{{ old('head_size', $cloth->head_size) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Ukuran Kepala">
                        @error('head_size')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- UkuranSepatu -->
                    <div>
                        <label for="shoe_size" class="text-gray-700">UkuranSepatu</label>
                        <input type="number" 
                               name="shoe_size" 
                               value="{{ old('shoe_size', $cloth->shoe_size) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="UkuranSepatu">
                        @error('shoe_size')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lainnya -->
                    <div>
                        <label for="others" class="text-gray-700">Lainnya</label>
                        <input type="text" 
                               name="others" 
                               value="{{ old('others', $cloth->others) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Lainnya">
                        @error('others')
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
                    <a href="{{ route('admin.student_health_record.index') }}" 
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
            placeholder: "Pilih Santri",
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