@extends('layouts.app', ['title' => 'Tambah Data Kesehatan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold text-gray-700">Tambah Data Kesehatan Santri</h2>
            </div>
            <hr class="mt-4">

            <form action="{{ route('admin.student_health_record.storee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

                    <!-- Golongan Darah -->
                    <div>
                        <label for="blood_type" class="text-gray-700">Golongan Darah</label>
                        <select name="blood_type" 
                                id="blood_type" 
                                class="w-full mt-2 px-3 border rounded-md bg-gray-100">
                            <option value="" disabled selected>Pilih Golongan Darah</option>
                            <option value="A+" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="B+" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="AB+" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="O+" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="A-" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B-" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB-" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O-" {{ old('blood_type', $healthrecord->blood_type ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                        @error('blood_type')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Riwayat Kesehatan -->
                    <div>
                        <label for="medical_history" class="text-gray-700">Riwayat Kesehatan</label>
                        <input type="text" 
                               name="medical_history" 
                               value="{{ old('medical_history') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Riwayat Kesehatan">
                        @error('medical_history')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alergi -->
                    <div>
                        <label for="allergies" class="text-gray-700">Alergi</label>
                        <input type="text" 
                               name="allergies" 
                               value="{{ old('allergies') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Alergi">
                        @error('allergies')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kontak Darurat -->
                    <div>
                        <label for="emergency_contact" class="text-gray-700">Kontak Darurat</label>
                        <input type="text" 
                               name="emergency_contact" 
                               value="{{ old('emergency_contact') }}" 
                               class="w-full mt-2 px-3 border rounded-md bg-gray-100 placeholder:italic" 
                               placeholder="Kontak Darurat">
                        @error('emergency_contact')
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
                    <a href="{{ route('admin.student_clothes.createe', ['student_id' => request()->get('student_id')]) }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Lewati
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</main>

<script>

    // Ambil kedua elemen select
    const bloodType = document.getElementById('blood_type');

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
    updateSelectStyle(bloodType);

    // Tambahkan event listener untuk perubahan pada kedua elemen
    bloodType.addEventListener('change', () => updateSelectStyle(bloodType));
</script>

@endsection
