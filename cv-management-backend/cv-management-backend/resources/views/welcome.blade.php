<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Management | Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans antialiased min-h-screen flex items-center justify-center px-4">

    <div class="max-w-3xl text-center">
        <h1 class="text-4xl sm:text-5xl font-bold mb-6">Welcome to CV Management</h1>
        <p class="text-gray-300 text-lg sm:text-xl mb-8">
            Create professional, modern, and clean American-style CVs in minutes.
            Store and manage your experience, education, and skills — all in one place.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-md text-white font-medium transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-gray-800 hover:bg-gray-700 rounded-md text-white font-medium transition">
                Register
            </a>
        </div>
    </div>

</body>
</html>
