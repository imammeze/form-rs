@extends('layouts.app')

@section('title', 'Terima Kasih - RSUD Ajibarang')

@section('content')
<div class="w-full max-w-md bg-white p-10 rounded-2xl shadow-sm border border-gray-100 text-center">
    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-2xl font-bold text-gray-900 mb-2">Terima Kasih!</h2>
    <p class="text-gray-600 mb-8">Saran, kritik, dan ulasan Anda sangat berharga bagi peningkatan mutu layanan RSUD Ajibarang. Laporan Anda telah diteruskan ke manajemen.</p>
    
    <a href="/" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
        Kembali ke Beranda
    </a>
</div>
@endsection