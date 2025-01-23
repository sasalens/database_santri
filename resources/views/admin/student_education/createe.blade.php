@extends('layouts.app', ['title' => 'Tambah Data Pendidikan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold text-gray-700">Tambah Data Pendidikan Santri</h2>
            </div>
            <hr class="mt-4">

            <form action="{{ route('admin.student_education.storee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

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
                               value="{{ old('class') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Kelas">
                        @error('class')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tahun masuk -->
                    <div>
                        <label for="entry_year" class="text-gray-700">Tahun Masuk</label>
                        <input type="number" 
                               name="entry_year" 
                               value="{{ old('entry_year') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic"  
                               placeholder="Tahun Masuk" 
                               required minlength="4">
                        @error('entry_year')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tahun Lulus -->
                    <div>
                        <label for="graduation_year" class="text-gray-700">Tahun Lulus</label>
                        <input type="number" 
                               name="graduation_year" 
                               value="{{ old('graduation_year') }}" 
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
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100 italic-placeholder">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Lulus" {{ old('graduation_status', $education->graduation_status ?? '') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                            <option value="Belum Lulus" {{ old('graduation_status', $education->graduation_status ?? '') == 'Belum Lulus' ? 'selected' : '' }}>Belum Lulus</option>
                            <option value="Tidak Lulus" {{ old('graduation_status', $education->graduation_status ?? '') == 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                        </select>
                        @error('graduation_status')
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
                    <a href="{{ route('admin.student_memorization.createe', ['student_id' => request()->get('student_id')]) }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Lewati
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</main>

<script>
    // Ambil kedua elemen select
    const educationLevelSelect = document.getElementById('education_level');
    const graduationStatusSelect = document.getElementById('graduation_status');

    // Function untuk memperbarui gaya
    function updateSelectStyle(selectElement) {
        if (selectElement.value === "") {
            selectElement.style.fontStyle = 'italic';
            selectElement.style.color = '#6b7280'; // Warna abu-abu
        } else {
            selectElement.style.fontStyle = 'normal';
            selectElement.style.color = '#374151'; // Warna teks default
        }
    }

    // Terapkan gaya awal ke kedua elemen
    updateSelectStyle(educationLevelSelect);
    updateSelectStyle(graduationStatusSelect);

    // Tambahkan event listener untuk perubahan pada kedua elemen
    educationLevelSelect.addEventListener('change', () => updateSelectStyle(educationLevelSelect));
    graduationStatusSelect.addEventListener('change', () => updateSelectStyle(graduationStatusSelect));

</script>


@endsection
