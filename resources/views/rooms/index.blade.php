<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Bella - Our Rooms</title>
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

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Our Rooms</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($rooms as $room)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ $room->image_url ?? 'https://via.placeholder.com/300x200' }}" 
                         alt="{{ $room->name }}" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $room->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($room->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold">${{ $room->price }}/night</span>
                            <a href="/rooms/{{ $room->id }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">No rooms available at the moment.</p>
            @endforelse
        </div>
    </div>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center">© {{ date('Y') }} Casa Bella. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>