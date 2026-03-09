<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - RSUD Ajibarang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center h-screen font-sans antialiased">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="text-center pt-8 px-8">
            <img src="{{ asset('images/logo_rsud.png') }}" alt="Logo RSUD" class="h-16 mx-auto mb-3 object-contain">
            <h2 class="text-2xl font-bold text-slate-800 tracking-wide">RSUD <span class="text-green-600">Ajibarang</span></h2>
            <p class="text-slate-500 text-sm mt-1">Sistem Manajemen Keluhan & Ulasan</p>
        </div>

        <div class="p-8">
            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                @csrf
                
                @error('email')
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                    <p class="text-sm text-red-700">{{ $message }}</p>
                </div>
                @enderror

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Administrator</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                      placeholder="Masukkan Email"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                      placeholder="Masukkan Password"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md transition-colors duration-200">
                    Masuk ke Dashboard
                </button>
            </form>
        </div>
    </div>

</body>
</html>