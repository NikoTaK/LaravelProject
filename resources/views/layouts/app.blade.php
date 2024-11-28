<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Bella - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <nav class="fixed top-0 left-0 w-full z-50" style="background-color: rgba(218, 203, 181, 1.00);">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/logo-casabella.png') }}" alt="Casa Bella Logo"
                            style="height: 140px; width: auto;">
                    </a>
                </div>

                <!-- Links Section -->
                <div class="space-x-8 flex items-center">
                    <a href="/" class="text-gray-700 hover:text-primary transition-colors text-lg">Home</a>
                    <a href="/rooms" class="text-gray-700 hover:text-primary transition-colors text-lg">Rooms</a>
                    <a href="/reservations/create"
                        class="text-gray-700 hover:text-primary transition-colors text-lg">Book Now</a>

                    @guest
                        <!-- Login/Signup for Guest Users -->
                        <a href="/login" class="text-gray-700 hover:text-primary transition-colors text-lg">Login</a>
                        <a href="/register" class="text-gray-700 hover:text-primary transition-colors text-lg">Sign Up</a>
                    @endguest

                    @auth
                        <!-- Hover Dropdown for Logged-in Users -->
                        <div class="relative group">
                            <div
                                class="flex items-center space-x-2 text-lg font-medium text-gray-700 cursor-pointer">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div
                                class="absolute right-0 w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 group-hover:opacity-100 transform scale-95 group-hover:scale-100 transition-all duration-150 ease-in-out">
                                <div class="py-1">
                                    <a href="{{ route('dashboard') }}"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h8m-6 6h6" />
                                        </svg>
                                        Dashboard
                                    </a>
                                    <a href="{{ route('profile.edit') }}"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 12.121A4 4 0 1012 5.121 4 4 0 105.121 12.12zM12 14.5l4 4m-8-4l4 4" />
                                        </svg>
                                        Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}"
                                        class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>





    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white mt-auto">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center">© {{ date('Y') }} Casa Bella. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
