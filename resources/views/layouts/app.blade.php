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
    <nav x-data="{ open: false }" class=" fixed top-0 left-0 w-full z-50" style="background-color: rgba(218, 203, 181, 1.00);">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/logo-casabella.png') }}"
                            alt="Casa Bella Logo"
                            style="height: 140px; width: auto;">
                    </a>
                </div>
                <div class="space-x-8">
                    <a href="/" class="text-gray-700 hover:text-primary transition-colors text-lg">Home</a>
                    <a href="/rooms" class="text-gray-700 hover:text-primary transition-colors text-lg">Rooms</a>
                    <a href="/reservations/create" class="text-gray-700 hover:text-primary transition-colors text-lg">Book Now</a>
                    @auth
                    <a href="/dashboard" class="text-gray-700 hover:text-primary transition-colors text-lg">Dashboard</a>
                    @else
                    <a href="/login" class="text-gray-700 hover:text-primary transition-colors text-lg">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <main>
        {{$slot}}
    </main>

    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center">© {{ date('Y') }} Casa Bella. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>