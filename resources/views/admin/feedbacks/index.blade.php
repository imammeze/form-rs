@extends('layouts.admin')

@section('title', 'Daftar Keluhan Pasien - Admin RSUD')

@section('header_title', 'Daftar Keluhan & Ulasan Pasien')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pasien</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Isi Keluhan/Saran</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bukti</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($feedbacks as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->created_at->format('d M Y, H:i') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->name ?: 'Anonim' }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 line-clamp-2 max-w-xs" title="{{ $item->content }}">
                                    {{ Str::limit($item->content, 60) }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->review)
                                    <div class="flex items-center">
                                        <span class="text-yellow-400 text-lg mr-1">★</span>
                                        <span class="text-sm font-semibold text-gray-700">{{ $item->review->rating }}/5</span>
                                    </div>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Belum Diulas
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($item->photo_path)
                                    <a href="{{ asset('storage/' . $item->photo_path) }}" target="_blank" class="text-blue-600 hover:text-blue-900 font-medium underline">Lihat Foto</a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">
                                Belum ada data keluhan atau saran yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($feedbacks->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $feedbacks->links() }}
            </div>
        @endif
    </div>
@endsection