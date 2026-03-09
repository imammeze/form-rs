@extends('layouts.app')

@section('title', 'Berikan Ulasan - RSUD Ajibarang')

@section('content')
<div class="w-full max-w-xl bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    <div class="mb-8 text-center">
        <img src="{{ asset('images/logo_rsud.png') }}" alt="Logo RSUD Ajibarang" class="h-16 mx-auto mb-4 object-contain">
        <h2 class="text-2xl font-bold text-gray-900">Bagaimana Perasaan Anda?</h2>
        <p class="text-gray-500 text-sm mt-2">Bantu kami mengetahui tingkat kepuasan Anda terhadap layanan di unit <span class="font-semibold text-blue-600">{{ $feedback->unit }}</span></p>
    </div>

    <form action="{{ route('review.store', $feedback->id) }}" method="POST" class="space-y-8">
        @csrf

        <div>
            <div class="flex justify-between sm:justify-center sm:space-x-4">
                @php
                    $emotions = [
                        1 => ['emoji' => '😡', 'label' => 'Sangat Buruk', 'color' => 'peer-checked:bg-red-100 peer-checked:border-red-500'],
                        2 => ['emoji' => '☹️', 'label' => 'Buruk', 'color' => 'peer-checked:bg-orange-100 peer-checked:border-orange-500'],
                        3 => ['emoji' => '😐', 'label' => 'Cukup', 'color' => 'peer-checked:bg-yellow-100 peer-checked:border-yellow-500'],
                        4 => ['emoji' => '🙂', 'label' => 'Baik', 'color' => 'peer-checked:bg-blue-100 peer-checked:border-blue-500'],
                        5 => ['emoji' => '😍', 'label' => 'Sangat Baik', 'color' => 'peer-checked:bg-green-100 peer-checked:border-green-500'],
                    ];
                @endphp

                @foreach ($emotions as $value => $data)
                    <label class="cursor-pointer text-center group">
                        <input type="radio" name="rating" value="{{ $value }}" class="peer sr-only" required>
                        
                        <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto flex items-center justify-center rounded-2xl border-2 border-gray-100 bg-gray-50 text-3xl sm:text-4xl transition-all duration-200 hover:bg-gray-100 hover:scale-105 {{ $data['color'] }}">
                            {{ $data['emoji'] }}
                        </div>
                        
                        <span class="block text-xs font-medium text-gray-500 mt-2 group-hover:text-gray-700 peer-checked:text-gray-900 peer-checked:font-bold">
                            {{ $data['label'] }}
                        </span>
                    </label>
                @endforeach
            </div>
            @error('rating') <p class="text-red-500 text-xs mt-3 text-center">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="review_text" class="block text-sm font-medium text-gray-700 mb-1">Ceritakan lebih lanjut (Opsional)</label>
            <textarea name="review_text" id="review_text" rows="3" placeholder="Apa yang membuat Anda merasa demikian?"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"></textarea>
        </div>

        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition-colors duration-200">
            Kirim Ulasan & Selesai
        </button>
    </form>
</div>
@endsection