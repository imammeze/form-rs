<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo_rsud.png') }}" type="image/png">
    <title>@yield('title', 'Layanan Pasien - RSUD Ajibarang')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col">

    <main class="grow flex items-center justify-center py-10 px-4">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} RSUD Ajibarang. Pemerintah Kabupaten Banyumas.
        </div>
    </footer>

</body>
</html>