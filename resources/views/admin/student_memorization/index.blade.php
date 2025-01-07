@extends('layouts.app', ['title' => 'Data Hafalan Santri - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="flex items-center">
            <button class="text-white bg-gray-600 px-4 py-2 shadow-sm rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                <a href="{{ route('admin.student_education.create') }}" class="flex items-center">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-table-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.5 21h-7.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5" /><path d="M3 10h18" /><path d="M10 3v18" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                    <span class="mx-3">Tambah</span>
                </a>
            </button>

            <div class="relative mx-4">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
                <form action="{{ route('admin.students.index') }}" method="GET">
                    <input class="form-input w-full rounded-lg pl-10 pr-4" type="text" name="q" value="{{ request()->query('q') }}"
                    placeholder="Search">
                </form>
            </div>
        </div>

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class="justify-between">
                        <tr class="bg-gray-600 w-full">
                            <th class="px-10 py-4 text-left">
                                <span class="text-white">No</span>
                            </th>
                            <th class="px-10 py-4 text-left">
                                <span class="text-white">Nama Santri</span>
                            </th>
                            <th class="px-10 py-4 text-left">
                                <span class="text-white">Total Juz</span>
                            </th>
                            <th class="px-10 py-4 text-left">
                                <span class="text-white">Tanggal</span>
                            </th>
                            <th class="px-10 py-4">
                                <span class="text-white">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @forelse($memorizations as $memorization)
                            <tr class="border bg-white">
        
                                <td class="px-10 py-2">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-10 py-2">
                                    {{ $memorization->student->full_name ?? 'Santri tidak ditemukan' }}
                                </td>
                                <td class="px-10 py-2">
                                    {{ $memorization->total_juz }}
                                </td>
                                <td class="px-10 py-2">
                                    {{ $memorization->last_updated }}
                                </td>

                                <td class="px-10 py-2 text-center">
                                    <div class="flex justify-center gap-2">
                                        <!-- Tautan untuk Edit -->
                                        <a href="{{ route('admin.student_memorization.edit', $memorization->id) }}" 
                                        class="bg-blue-600 px-3 py-2 rounded shadow-sm text-xs text-white focus:outline-none">
                                            Edit
                                        </a>
                                        
                                        <!-- Tombol untuk Hapus -->
                                        <button onClick="destroy(this.id)" 
                                                id="{{ $education->id }}" 
                                                class="bg-red-600 px-3 py-2 rounded shadow-sm text-xs text-white focus:outline-none">
                                            Hapus
                                        </button>
                                    </div>
                                </td>


                            </tr>
                        @empty
                            <div class="bg-red-500 text-white text-center p-3 rounded-sm shadow-md">
                                Data Belum Tersedia!
                            </div>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>
<script>
    //ajax delete
    function destroy(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah kamu yakin ?',
            text: "ingin menghapus data ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Ga jadi deh',
            confirmButtonText: 'Yaa, Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX DELETE request
                $.ajax({
                    url: `/admin/student_memorization/${id}`, 
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'Data Berhasil dihapus!',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'Data gagal dihapus!',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal menghapus data!',
                            showConfirmButton: false,
                            timer: 1000
                        }).then(function () {
                            location.reload();
                        });
                    }
                });
            }
        })
    }
</script>
@endsection