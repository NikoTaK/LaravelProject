<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Bella - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold">
                    <a href="{{ route('home') }}">Casa Bella</a>
                </div>
                <div class="space-x-4">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('rooms.index') }}">Rooms</a>
                    <a href="{{ route('reservations.create') }}">Book Now</a>
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center">© {{ date('Y') }} Casa Bella. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
