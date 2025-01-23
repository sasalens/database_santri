@extends('layouts.app', ['title' => 'Tambah Data Pakaian Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold text-gray-700">Tambah Data Pakaian Santri</h2>
            </div>
            <hr class="mt-4">

            <form action="{{ route('admin.student_clothes.storee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

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
                        <label for="pants_size" class="text-gray-700">Ukuran Celana/Rok</label>
                        <input type="number" 
                               name="pants_size" 
                               value="{{ old('pants_size') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Ukuran Celana/Rok">
                        @error('pants_size')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ukuran Kepala -->
                    <div>
                        <label for="head_size" class="text-gray-700">Ukuran Kepala</label>
                        <input type="number" 
                               name="head_size" 
                               value="{{ old('head_size') }}" 
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
                               value="{{ old('shoe_size') }}" 
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
                               value="{{ old('others') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Lainnya">
                        @error('others')
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
                    <a href="{{ route('admin.students.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Lewati
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</main>

<script>

    // Ambil kedua elemen select
    const shirtSize = document.getElementById('shirt_size');

    // Function untuk memperbarui gaya
    function updateSelectStyle(selectElement) {
        if (selectElement.value === "") {
            selectElement.style.fontStyle = 'italic';
            selectElement.style.color = '#6b7280'; 
        } else {
            selectElement.style.fontStyle = 'normal';
            selectElement.style.color = '#374151'; 
        }
    }

    // Terapkan gaya awal ke kedua elemen
    updateSelectStyle(shirtSize);

    // Tambahkan event listener untuk perubahan pada kedua elemen
    shirtSize.addEventListener('change', () => updateSelectStyle(shirtSize));
</script>

@endsection
