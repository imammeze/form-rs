<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - RSUD Ajibarang')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-800 text-white flex flex-col shadow-xl z-20">
        <div class="h-16 flex items-center px-6 bg-slate-800 border-b border-slate-700">
            <img src="{{ asset('images/logo_rsud.png') }}" alt="Logo RSUD" class="h-8 w-auto mr-3 object-contain">
            <span class="font-bold text-lg tracking-wider">RSUD <span class="text-white">Ajibarang</span></span>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <p class="px-2 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
            
            <a href="{{ route('admin.feedbacks.index') }}" class="flex items-center px-4 py-2.5 bg-blue-600 text-white rounded-lg transition-colors group">
                <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                Keluhan & Ulasan
            </a>
            
            </nav>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 border-b border-gray-200 z-10">
            <h2 class="text-xl font-semibold text-gray-800">@yield('header_title', 'Dashboard')</h2>
            
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold uppercase">
                        {{ substr(auth()->user()->name, 0, 1) }} </div>
                    <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 transition-colors">
                        Keluar
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            @yield('content')
        </main>

        <div class="p-4 border-t shadow-lg text-xs text-slate-500 text-center">
            &copy; {{ date('Y') }} RSUD Ajibarang
        </div>
        
    </div>

</body>
</html>