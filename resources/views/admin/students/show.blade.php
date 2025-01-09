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

                    <x-view-detail label="Nama Lengkap" value="{{ $student->full_name }}"></x-view-detail>
                    <x-view-detail label="Nama Pondok" value="{{ $student->nickname }}"></x-view-detail>
                    <x-view-detail label="Jenis Kelamin" value="{{ $student->gender }}"></x-view-detail>
                    <x-view-detail label="Tanggal Lahir" value="{{ $student->birth_date }}"></x-view-detail>
                    <x-view-detail label="Tempat Lahir" value="{{ $student->birth_place }}"></x-view-detail>
                    <div class="mt-4">
                        <label class="block">
                            <span class="text-gray-700 text-sm">Alamat</span>
                            <textarea name="address" id="" class="form-input mt-1 block w-full rounded-md" readonly>{{ $student->address }}</textarea>
                        </label>
                    </div>
                    <x-view-detail label="NIK" value="{{ $student->national_id }}"></x-view-detail>
                    <x-view-detail label="Agama" value="{{ $student->religion }}"></x-view-detail>
                    <x-view-detail label="Status" value="{{ $student->status }}"></x-view-detail>
                    <br>
                    <!-- <a href="{{ route('admin.students.edit', $student->id) }}" class="bg-blue-600 px-4 py-2 rounded text-m text-white focus:outline-none">Edit Data</a> -->
                </div>
            </div>

            <div>
                <div class="p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL WALI SANTRI</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Nama Ayah" value="{{ $student->full_name }}"></x-view-detail>
                    <x-view-detail label="Pekerjaan Ayah" value="{{ $student->nickname }}"></x-view-detail>
                    <x-view-detail label="No Hp Ayah" value="{{ $student->gender }}"></x-view-detail>
                </div>

                <div class="mt-6 p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">DETAIL PENDIDIKAN</h2>
                    <hr class="mt-4">

                    <x-view-detail label="Nama Lengkap" value="{{ $student->full_name }}"></x-view-detail>
                    <x-view-detail label="Nama Pondok" value="{{ $student->nickname }}"></x-view-detail>
                    <x-view-detail label="Jenis Kelamin" value="{{ $student->gender }}"></x-view-detail>
                </div>
            </div>

        </div>

    </div>
</main>
@endsection