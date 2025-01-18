@extends('layouts.app', ['title' => 'Edit Data Pendidikan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-semibold text-gray-700">Edit Data Pendidikan {{ $education->student->full_name }}</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.student_education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

                    <!-- Nama Santri -->
                    <div>
                        <label for="student_id" class="text-gray-700">Nama Santri</label>
                        <input type="text" 
                            value="{{ $education->student->full_name }}" 
                            class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                            readonly>
                        <input type="hidden" name="student_id" value="{{ $education->student_id }}">
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
                               required maxlength="5">
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
                               required min="1900" max="3000">
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

@endsection