<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CV Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite Build CSS/JS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-37963842.css') }}">
    <script type="module" src="{{ asset('build/assets/app-6d651f5d.js') }}"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased min-h-screen flex flex-col">
    
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Header -->
    @if (isset($header))
        <header class="bg-gray-800 shadow-sm">
            <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8">
                <h2 class="text-lg font-semibold text-white">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endif

    <!-- Main -->
    <main class="flex-1 bg-gray-900">
        <div class="py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 text-center text-sm text-gray-400">
        © {{ date('Y') }} CV Management Platform - Designed by Egemen
    </footer>

</body>
</html>
