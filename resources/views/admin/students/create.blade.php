@extends('layouts.app', ['title' => 'Tambah Data Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold text-gray-700">Tambah Data Santri</h2>
            </div>
            <hr class="mt-4">

            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="full_name" class="text-gray-700">Nama Lengkap</label>
                        <input type="text" 
                               name="full_name" 
                               value="{{ old('full_name') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
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
                               value="{{ old('nickname') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Nama Pondok">
                        @error('nickname')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="gender" class="text-gray-700">Jenis Kelamin</label>
                        <div class="flex items-center mt-2 space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Laki-laki" class="form-radio" required>
                                <span class="ml-2">Laki-laki</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Perempuan" class="form-radio" required>
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
                               value="{{ old('birth_date') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100" 
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
                               value="{{ old('birth_place') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
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
                                  class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                                  placeholder="Alamat Lengkap" required>{{ old('address') }}</textarea>
                        @error('address')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="national_id" class="text-gray-700">NIK</label>
                        <input type="text" 
                               name="national_id" 
                               value="{{ old('national_id') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Nomor NIK" maxlength="16">
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
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100 italic-placeholder" 
                                required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Aktif" class="text-gray-700">Aktif</option>
                            <option value="Alumni" class="text-gray-700">Alumni</option>
                        </select>
                        @error('status')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="flex items-start gap-6 mt-4 col-span-1 md:col-span-2 lg:col-span-2">
                        <!-- Menampilkan Foto -->
                        <div class="flex-shrink-0">
                            <img 
                                id="photoPreview" 
                                src="{{ !empty($student->photo) ? asset('storage/' . $student->photo) : '' }}" 
                                alt="Foto Santri" 
                                class="w-32 h-32 object-cover rounded border border-gray-300 {{ empty($student->photo) ? 'hidden' : '' }}"
                            >
                            <div 
                                id="placeholderPreview" 
                                class="w-32 h-32 bg-gray-100 flex items-center justify-center border border-gray-300 rounded {{ !empty($student->photo) ? 'hidden' : '' }}"
                            >
                                <span class="text-sm text-gray-500">Tidak ada foto</span>
                            </div>
                        </div>

                        <!-- Input File -->
                        <div class="flex-grow">
                            <label for="photo" class="text-gray-700 block mb-2">Foto</label>
                            <input 
                                type="file" 
                                name="photo" 
                                id="photo" 
                                class="w-full p-2 border rounded-md bg-gray-100 placeholder:italic"
                                accept=".jpg,.jpeg,.png"
                            >
                            <p class="text-sm italic text-gray-500 mt-2">Unggah foto, jika tidak ingin biarkan kosong.</p>
                            @error('photo')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex space-x-4">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Data
                    </button>
                    <a href="{{ route('admin.students.index') }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewImg = document.getElementById('photoPreview');
        const placeholder = document.getElementById('placeholderPreview');

        if (file) {
            const reader = new FileReader();

            // Saat file selesai dibaca, tampilkan hasilnya di img
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        } else {
            // Jika input file di-reset, tampilkan kembali placeholder
            previewImg.src = '';
            previewImg.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    });
</script>

<style>
    /* Custom style untuk membuat teks pertama menjadi italic */
    .italic-placeholder:invalid {
        font-style: italic;
        color: #6b7280;
    }
</style>

@endsection
