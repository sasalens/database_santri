@extends('layouts.app', ['title' => 'Edit Data Wali Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-semibold text-gray-700">Edit Data Wali Santri</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.student_guardian.update', $student_guardian->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Nama Ayah -->
                    <div>
                        <label for="father_name" class="text-gray-700">Nama Ayah</label>
                        <input type="text" 
                               name="father_name" 
                               value="{{ old('father_name', $student_guardian->father_name) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Nama Ayah" 
                               required>
                        @error('father_name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pekerjaan Ayah -->
                    <div>
                        <label for="father_occupation" class="text-gray-700">Pekerjaan Ayah</label>
                        <input type="text" 
                               name="father_occupation" 
                               value="{{ old('father_occupation', $student_guardian->father_occupation) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Pekerjaan Ayah">
                        @error('father_occupation')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Hp Ayah -->
                    <div>
                        <label for="father_phone" class="text-gray-700">No Telepon Ayah</label>
                        <input type="text" 
                               name="father_phone" 
                               value="{{ old('father_phone', $student_guardian->father_phone) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="No Telepon Ayah">
                        @error('father_phone')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Ibu -->
                    <div>
                        <label for="mother_name" class="text-gray-700">Nama Ibu</label>
                        <input type="text" 
                               name="mother_name" 
                               value="{{ old('mother_name', $student_guardian->mother_name) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Nama Ibu" 
                               required>
                        @error('mother_name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pekerjaan Ibu -->
                    <div>
                        <label for="mother_occupation" class="text-gray-700">Pekerjaan Ibu</label>
                        <input type="text" 
                               name="mother_occupation" 
                               value="{{ old('mother_occupation', $student_guardian->mother_occupation) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Pekerjaan Ibu">
                        @error('mother_occupation')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Hp Ibu -->
                    <div>
                        <label for="mother_phone" class="text-gray-700">No Telepon Ibu</label>
                        <input type="text" 
                               name="mother_phone" 
                               value="{{ old('mother_phone', $student_guardian->mother_phone) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="No Telepon Ibu">
                        @error('mother_phone')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Wali -->
                    <div>
                        <label for="guardian_name" class="text-gray-700">Nama Wali</label>
                        <input type="text" 
                               name="guardian_name" 
                               value="{{ old('guardian_name', $student_guardian->guardian_name) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="Nama Wali">
                        @error('guardian_name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Hubungan -->
                    <div>
                        <label for="guardian_relationship" class="text-gray-700">Hubungan</label>
                        <select name="guardian_relationship" 
                                id="guardian_relationship" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100">
                            <option value="" disabled selected>Pilih Hubungan</option>
                            <option value="Orang Tua" {{ old('guardian_relationship', $student_guardian->guardian_relationship ?? '') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                            <option value="Saudara" {{ old('guardian_relationship', $student_guardian->guardian_relationship ?? '') == 'Saudara' ? 'selected' : '' }}>Saudara</option>
                            <option value="Paman" {{ old('guardian_relationship', $student_guardian->guardian_relationship ?? '') == 'Paman' ? 'selected' : '' }}>Paman</option>
                            <option value="Bibi" {{ old('guardian_relationship', $student_guardian->guardian_relationship ?? '') == 'Bibi' ? 'selected' : '' }}>Bibi</option>
                            <option value="Lainnya" {{ old('guardian_relationship', $student_guardian->guardian_relationship ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('guardian_relationship')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Hp Wali -->
                    <div>
                        <label for="guardian_phone" class="text-gray-700">No Telepon Wali</label>
                        <input type="text" 
                               name="guardian_phone" 
                               value="{{ old('guardian_phone', $student_guardian->guardian_phone) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               placeholder="No Telepon Wali">
                        @error('guardian_phone')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Santri -->
                    <div>
                        <label for="student_id" class="text-gray-700 my-2 block">Nama Santri</label>
                        <select id="student_id" name="student_id[]" class="w-full mt-2 px-5 border rounded-md bg-gray-100 select2" multiple>
                            @foreach ($allStudents as $student)
                                <option value="{{ $student->id }}" 
                                        {{ in_array($student->id, $student_guardian->students->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $student->full_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Aalamat -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <label for="address" class="text-gray-700">Alamat</label>
                        <textarea name="address" 
                                  id="address" 
                                  class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                                  placeholder="Alamat" required>{{ old('address', $student_guardian->address) }}</textarea>
                        @error('address')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    
                </div>

                <div class="flex justify-start mt-10 space-x-4">
                    <!-- Tombol Simpan Data -->
                    <button 
                        type="submit" 
                        class="flex px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update Data
                    </button>
                    <!-- Tombol Batal -->
                    <a href="{{ route('admin.student_guardian.index') }}" 
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