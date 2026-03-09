@extends('layouts.app')

@section('title', 'Berikan Ulasan - RSUD Ajibarang')

@section('content')
<div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    <div class="mb-8 text-center">
        <img src="{{ asset('images/logo_rsud.png') }}" alt="Logo RSUD Ajibarang" class="h-16 mx-auto mb-4 object-contain">
        <h2 class="text-2xl font-bold text-gray-900">Nilai Layanan Kami</h2>
        <p class="text-gray-500 text-sm mt-2">Bagaimana pengalaman Anda secara keseluruhan di unit <span class="font-semibold text-blue-600">{{ $feedback->unit }}</span>?</p>
    </div>

    <form action="{{ route('review.store', $feedback->id) }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3 text-center">Pilih Rating (1-5)</label>
            <div class="flex justify-center space-x-4">
                @for ($i = 1; $i <= 5; $i++)
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="{{ $i }}" class="peer sr-only" required>
                        <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-200 text-gray-400 font-bold text-lg peer-checked:border-yellow-400 peer-checked:bg-yellow-400 peer-checked:text-white hover:bg-gray-50 transition-all">
                            {{ $i }}
                        </div>
                    </label>
                @endfor
            </div>
            @error('rating') <p class="text-red-500 text-xs mt-2 text-center">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="review_text" class="block text-sm font-medium text-gray-700 mb-1">Ulasan Tambahan (Opsional)</label>
            <textarea name="review_text" id="review_text" rows="3" placeholder="Ada hal lain yang ingin disampaikan?"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"></textarea>
        </div>
        
        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition-colors duration-200">
            Kirim Ulasan & Selesai
        </button>
    </form>
</div>
@endsection