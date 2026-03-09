@extends('layouts.app')

@section('title', 'Saran & Kritik - RSUD Ajibarang')

@section('content')
<div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    
    <div class="mb-8 text-center">
        <img src="{{ asset('images/logo_rsud.png') }}" alt="Logo RSUD Ajibarang" class="h-24 mx-auto mb-4 object-contain">
        <h1 class="text-3xl font-extrabold text-gray-900">Saran & Kritik Layanan</h1>
        <h2 class="text-xl font-bold text-green-600 mt-1 uppercase tracking-wide">RSUD Ajibarang</h2>
        <p class="text-gray-500 text-sm mt-3 px-4">
            Bantu kami meningkatkan kualitas pelayanan di RSUD Ajibarang dengan memberikan masukan yang membangun.
        </p>
    </div>

    <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap (Opsional)</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="unit" class="block text-sm font-medium text-gray-700 mb-1">Unit Layanan <span class="text-red-500">*</span></label>
                <select name="unit" id="unit" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                    <option value="" disabled selected>Pilih unit layanan...</option>
                    <option value="IGD" {{ old('unit') == 'IGD' ? 'selected' : '' }}>IGD</option>
                    <option value="Rawat Jalan (Poliklinik)" {{ old('unit') == 'Rawat Jalan (Poliklinik)' ? 'selected' : '' }}>Rawat Jalan (Poliklinik)</option>
                    <option value="Rawat Inap" {{ old('unit') == 'Rawat Inap' ? 'selected' : '' }}>Rawat Inap</option>
                    <option value="Apotek/Farmasi" {{ old('unit') == 'Apotek/Farmasi' ? 'selected' : '' }}>Apotek/Farmasi</option>
                    <option value="Laboratorium" {{ old('unit') == 'Laboratorium' ? 'selected' : '' }}>Laboratorium</option>
                </select>
                @error('unit') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Saran / Keluhan <span class="text-red-500">*</span></label>
                <textarea name="content" id="content" rows="4" required placeholder="Ceritakan pengalaman Anda di sini..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">{{ old('content') }}</textarea>
                @error('content') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Lampirkan Foto/Bukti (Opsional)</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maksimal 2MB.</p>
                @error('photo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

        
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition-colors duration-200">
            Kirim
        </button>
    </form>
</div>
@endsection