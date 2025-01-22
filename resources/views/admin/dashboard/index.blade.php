@extends('layouts.app', ['title' => 'Dashboard - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="container mx-auto px-6 py-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- Card Jumlah Santri -->
            <div class="flex items-center p-6 bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow duration-300">
                <div class="p-4 rounded-full bg-indigo-600 bg-opacity-80">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ $totalStudents }}</h4>
                    <div class="text-sm text-gray-500">Jumlah Santri</div>
                </div>
            </div>

            <!-- Card Jumlah Wali -->
            <div class="flex items-center p-6 bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow duration-300">
                <div class="p-4 rounded-full bg-pink-600 bg-opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-white">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                        <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ $totalGuardian }}</h4>
                    <div class="text-sm text-gray-500">Jumlah Wali Santri</div>
                </div>
            </div>

            <!-- Card Jumlah Alumni -->
            <div class="flex items-center p-6 bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow duration-300">
                <div class="p-4 rounded-full bg-green-600 bg-opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" stroke="currentColor" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-2xl font-semibold text-gray-700">900</h4>
                    <div class="text-sm text-gray-500">Jumlah Alumni</div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
