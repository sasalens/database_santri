@extends('layouts.app', ['title' => 'Edit Data Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center gap-x-5">
                <h2 class="text-3xl font-bold text-gray-700">Edit Data Santri</h2>
            </div>
            <hr class="mt-4">
            <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="full_name" class="text-gray-700">Nama Lengkap</label>
                        <input type="text" 
                               name="full_name" 
                               value="{{ old('full_name', $student->full_name) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300 placeholder:italic" 
                               placeholder="Nama Lengkap" 
                               required minlength="3">
                        @error('full_name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Pondok -->
                    <div>
                        <label for="nickname" class="text-gray-700">Nama Pondok</label>
                        <input type="text" 
                               name="nickname" 
                               value="{{ old('nickname', $student->nickname) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300 placeholder:italic" 
                               placeholder="Nama Pondok">
                        @error('nickname')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="gender" class="text-gray-700">Jenis Kelamin</label>
                        <div class="form_check mt-2">
                        <label class="inline-flex items-center mr-5">
                            <input 
                                type="radio" 
                                name="gender" 
                                value="Laki-laki" 
                                class="form-check-input" 
                                {{ old('gender', $student->gender) === 'Laki-laki' ? 'checked' : '' }} 
                                required
                            >
                            <span class="ml-2">Laki-laki</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input 
                                type="radio" 
                                name="gender" 
                                value="Perempuan" 
                                class="form-check-input" 
                                {{ old('gender', $student->gender) === 'Perempuan' ? 'checked' : '' }} 
                                required
                            >
                            <span class="ml-2">Perempuan</span>
                        </label>

                        </div>
                        @error('gender')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="birth_date" class="text-gray-700">Tanggal Lahir</label>
                        <input type="date" 
                               name="birth_date" 
                               value="{{ old('birth_date', $student->birth_date) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" 
                               required>
                        @error('birth_date')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label for="birth_place" class="text-gray-700">Tempat Lahir</label>
                        <input type="text" 
                               name="birth_place" 
                               value="{{ old('birth_place', $student->birth_place) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300 placeholder:italic" 
                               placeholder="Tempat Lahir">
                        @error('birth_place')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <label for="address" class="text-gray-700">Alamat</label>
                        <textarea name="address" 
                                  id="address" 
                                  class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300 placeholder:italic" 
                                  placeholder="Alamat" required>{{ old('address', $student->address) }}</textarea>
                        @error('address')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="national_id" class="text-gray-700">NIK</label>
                        <input type="text" 
                               name="national_id" 
                               value="{{ old('national_id', $student->national_id) }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300 placeholder:italic" 
                               placeholder="NIK" maxlength="16">
                        @error('national_id')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="religion" class="text-gray-700">Agama</label>
                        <input type="text" 
                               name="religion" 
                               value="Islam" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
                               readonly>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="text-gray-700">Status</label>
                        <select id="status" 
                                name="status" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300" 
                                required>
                            <option value="" disabled {{ old('status', $student->status) === null ? 'selected' : '' }}>Pilih Status</option>
                            <option class="py-1" value="Aktif" {{ old('status', $student->status) === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option class="py-1" value="Alumni" {{ old('status', $student->status) === 'Alumni' ? 'selected' : '' }}>Alumni</option>
                        </select>
                        @error('status')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="flex items-start gap-6 mt-4 col-span-1 md:col-span-2 lg:col-span-2">
                        <!-- Menampilkan Foto -->
                        <div class="flex-shrink-0">
                            @if (!empty($student->photo))
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Foto Santri" class="w-32 h-32 object-cover rounded border border-gray-300">
                               
                            @else
                                <div class="w-32 h-32 bg-gray-100 flex items-center justify-center border border-gray-300 rounded">
                                    <span class="text-sm text-gray-500">Tidak ada foto</span>
                                </div>
                            @endif
                        </div>

                        <!-- Input File -->
                        <div class="flex-grow">
                            <label for="photo" class="text-gray-700 block mb-2">Foto</label>
                            <input 
                                type="file" 
                                name="photo" 
                                id="photo" 
                                class="w-full p-2 border rounded-md bg-gray-100 focus:outline-none focus:ring focus:ring-blue-300"
                                accept=".jpg,.jpeg,.png"
                            >
                            <p class="text-sm italic text-gray-500 mt-2">Unggah foto baru jika ingin mengganti.</p>
                            @error('photo')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    
                </div>

                <div class="flex justify-start mt-10 space-x-4">
                    <!-- Tombol Simpan Data -->
                    <button 
                        type="submit" 
                        class="flex px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                        Update Data
                    </button>
                    <!-- Tombol Batal -->
                    <a href="{{ route('admin.students.index') }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300">
                        Batal
                    </a>
                </div>

            </form>
        </div>
        
    </div>
</main>

@endsection