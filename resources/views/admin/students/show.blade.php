@extends('layouts.app', ['title' => 'Profile - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">

            <div>
                <div class="p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold">DETAIL SANTRI</h2>
                    <hr class="mt-4">

                    <div class="mt-4 mb-6">
                        <img src="{{ $student->photo ? asset('storage/' . $student->photo) : 'https://assalamkubar.com/wp-content/uploads/2024/07/man_person_people_avatar_icon_230017.png' }}" 
                            alt="Foto Santri" 
                            style="width: 180px; height: 220px; object-fit: cover;" 
                            class="border-4 border-white rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    </div>

                    <x-view-detail label="Nama Lengkap" value="{{ $student->full_name ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Nama Pondok" value="{{ $student->nickname ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Jenis Kelamin" value="{{ $student->gender ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Tanggal Lahir" value="{{ $student->birth_date ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Tempat Lahir" value="{{ $student->birth_place ?? '_' }}"></x-view-detail>
                    <x-view-detail label="No Telepon" value="{{ $student->no_hp ?? '_' }}"></x-view-detail>
                    <div class="mt-4">
                        <label class="block">
                            <span class="text-gray-700 text-sm">Alamat</span>
                            <textarea name="address" id="" class="form-input mt-1 block w-full rounded-md" readonly>{{ $student->address ?? '_' }}</textarea>
                        </label>
                    </div>
                    <x-view-detail label="NIK" value="{{ $student->national_id ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Agama" value="{{ $student->religion ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Status" value="{{ $student->status ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Tahun Lulus" value="{{ $student->graduation_year ?? '_' }}"></x-view-detail>
                    <br>
                    <!-- <a href="{{ route('admin.students.edit', $student->id) }}" class="bg-blue-600 px-4 py-2 rounded text-m text-white focus:outline-none">Edit Data</a> -->
                </div>
            </div>

            <div>
                <div class="p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL WALI SANTRI</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Nama Wali" value="{{ $student->guardian->guardian_name ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Hubungan Dengan Wali" value="{{ $student->guardian->guardian_relationship ?? '_' }}"></x-view-detail>
                    <x-view-detail label="No Hp Wali" value="{{ $student->guardian->guardian_phone ?? '_' }}"></x-view-detail>
                    <div class="mt-4">
                        <label class="block">
                            <span class="text-gray-700 text-sm">Alamat Wali</span>
                            <textarea name="address" id="" class="mt-1 block w-full rounded-md" readonly>{{ $student->address }}</textarea>
                        </label>
                    </div>
                </div>

                <div class="mt-6 p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL PENDIDIKAN</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Kelas" value="{{ $student->education->class ?? '_' }} - {{ $student->education->education_level ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Tahun Masuk" value="{{ $student->education->entry_year ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Tahun Lulus" value="{{ $student->education->graduation_year ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Status" value="{{ $student->education->graduation_status ?? '_' }}"></x-view-detail>
                </div>

                <div class="mt-6 p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL HAFALAN</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Total Hafalan" value="{{ $student->memorization->total_juz ?? '_' }} Juz"></x-view-detail>
                    <x-view-detail label="Tanggal" value="{{ $student->memorization->last_updated ?? '_' }}"></x-view-detail>
                </div>

                <div class="mt-6 p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL KESEHATAN</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Golongan Darah" value="{{ $student->healthrecord->blood_type ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Riwayat Kesehatan" value="{{ $student->healthrecord->medical_history ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Alergi" value="{{ $student->healthrecord->allergies ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Kontak Darurat" value="{{ $student->healthrecord->emergency_contact ?? '_' }}"></x-view-detail>
                </div>

                <div class="mt-6 p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL UKURAN PAKAIAN</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Ukuran Baju" value="{{ $student->clothes->shirt_size ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Ukuran Celana/Rok" value="{{ $student->clothes->pants_size ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Ukuran Kepala" value="{{ $student->clothes->head_size ?? '_' }}"></x-view-detail>
                    <x-view-detail label="Ukuran Sepatu" value="{{ $student->clothes->shoe_size ?? '_' }}"></x-view-detail>
                </div>

            </div>

        </div>

    </div>
</main>
@endsection