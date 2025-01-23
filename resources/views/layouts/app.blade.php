<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="https://i.imgur.com/UyXqJLi.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <!-- css -->
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS for Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- JS for Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<body>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center px-5 py-5">
                <div class="flex items-center">
                    <img src="https://assalamkubar.com/wp-content/uploads/2023/07/logo.png" alt="" class="flex w-40">
                </div>
            </div>

            <!-- <hr> -->

            <nav class="mt-5">
                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/dashboard*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500' }}" href="{{ route('admin.dashboard.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4h6v6h-6z" />
                        <path d="M14 4h6v6h-6z" />
                        <path d="M4 14h6v6h-6z" />
                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    </svg>
                    <span class="mx-3">Dashboard</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/students', 'admin/students/create', 'admin/students/*/edit') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.students.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <span class="mx-3">Santri</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/student_guardian*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.student_guardian.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-friends">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                        <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                    </svg>
                    <span class="mx-3">Wali Santri</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/student_education*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.student_education.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" />
                        <path d="M19 16h-12a2 2 0 0 0 -2 2" />
                        <path d="M9 8h6" />
                    </svg>
                    <span class="mx-3">Pendidikan</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/student_memorization*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.student_memorization.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6l0 13" />
                        <path d="M12 6l0 13" />
                        <path d="M21 6l0 13" />
                    </svg>
                    <span class="mx-3">Hafalan</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/student_health_record*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.student_health_record.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-heart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M11.993 16.75l2.747 -2.815a1.9 1.9 0 0 0 0 -2.632a1.775 1.775 0 0 0 -2.56 0l-.183 .188l-.183 -.189a1.775 1.775 0 0 0 -2.56 0a1.899 1.899 0 0 0 0 2.632l2.738 2.825z" />
                    </svg>
                    <span class="mx-3">Kesehatan</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/student_clothes*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.student_clothes.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shirt">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
                    </svg>
                    <span class="mx-3">Pakaian</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/students/alumni') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.students.alumni') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <span class="mx-3">Alumni</span>
                </a>

                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/profile*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' :  'text-gray-500' }}"
                    href="{{ route('admin.profile.index') }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="mx-3">Admin</span>
                </a>

            </nav>
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-5 px-6 bg-white">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Bagian Teks -->
                    <div class="text-right">
                        <p class="text-gray-700 font-semibold">{{ auth()->user()->email }}</p>
                        <p class="text-gray-500 text-xs">{{ auth()->user()->name }}</p>
                    </div>    
                
                    <!-- Bagian Foto -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen" :aria-expanded="dropdownOpen"
                            class="relative block h-10 w-10 rounded-full overflow-hidden shadow focus:outline-none">
                            <img class="h-full w-full object-cover"
                                src="{{ auth()->user()->avatar ?? asset('images/default-avatar.png') }}" alt="User Avatar">
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                        <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl ring-1 ring-gray-200 z-20">

                            <!-- Tanda Siku di Pojok Kanan Atas -->
                            <div class="absolute top-[-8px] right-3 w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-gray-300"></div>

                            <!-- Nama User -->
                            <a href="#" class="block px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-blue-500 hover:text-white transition duration-200 rounded-t-lg group">
                                {{ auth()->user()->name }}
                                <span class="block text-xs font-normal text-gray-500 mt-1 group-hover:text-white transition duration-200 rounded-t-lg">Edit Profil</span>
                            </a>

                            <hr class="border-t border-gray-200">

                            <!-- Logout -->
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white transition duration-200 rounded-b-lg">
                                Logout
                            </a>

                            <!-- Logout Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </div>
  
                </div>

            </header>

            @yield('content')

        </div>
    </div>

    <script>
        @if(session()->has('success'))

        Swal.fire({
            icon: 'success',
            title: 'BERHASIL!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1000
        })

        @elseif(session()->has('error'))

        Swal.fire({
            icon: 'error',
            text: 'GAGAL!',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1000
        })

        @endif
    </script>
</body>
</html>