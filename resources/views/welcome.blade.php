<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Bella - Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold">
                    <a href="/">Casa Bella</a>
                </div>
                <div class="space-x-4">
                    <a href="/">Home</a>
                    <a href="/rooms">Rooms</a>
                    <a href="/reservations/create">Book Now</a>
                    @auth
                        <a href="/dashboard">Dashboard</a>
                    @else
                        <a href="/login">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <div class="relative h-[600px]">
            <div class="absolute inset-0">
                <img src="{{ asset('images/hotel-hero.jpg') }}" class="w-full h-full object-cover" alt="Casa Bella Hotel">
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>
            <div class="relative container mx-auto px-6 h-full flex items-center">
                <div class="text-white">
                    <h1 class="text-5xl font-bold mb-4">Welcome to Casa Bella</h1>
                    <p class="text-xl mb-8">Experience luxury and comfort in the heart of the city</p>
                    <a href="{{ route('rooms.index') }}" class="bg-primary text-white px-6 py-3 rounded-lg">
                        Explore Our Rooms
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Rooms -->
        <div class="container mx-auto px-6 py-16">
            <h2 class="text-3xl font-semibold mb-8">Featured Rooms</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($featuredRooms as $room)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ $room->image_url }}" class="w-full h-48 object-cover" alt="{{ $room->name }}">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">{{ $room->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($room->description, 100) }}</p>
                            <p class="text-primary font-bold mb-4">${{ $room->price }} / night</p>
                            <a href="{{ route('rooms.show', $room) }}" class="text-primary hover:underline">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No featured rooms available at the moment.</p>
                @endforelse
            </div>
        </div>

        <!-- Latest Reviews -->
        <div class="bg-gray-100 py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-semibold mb-8">What Our Guests Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse($latestReviews as $review)
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-gray-200 mr-4"></div>
                                <div>
                                    <h4 class="font-semibold">{{ $review->user->name }}</h4>
                                    <div class="text-yellow-400">
                                        @for($i = 0; $i < $review->rating; $i++)
                                            ★
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600">{{ Str::limit($review->comment, 150) }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No reviews available yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center">© {{ date('Y') }} Casa Bella. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

