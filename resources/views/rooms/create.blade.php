<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room - Casa Bella</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow fixed w-full z-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center h-24">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/logo-casabella.png') }}" 
                             alt="Casa Bella Logo" 
                             class="h-20 w-auto">
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

    <main class="container mx-auto px-6 py-32">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">Create New Room</h1>

            @if ($errors->any())
                <div class="bg-red-50 text-red-500 p-4 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-8">
                @csrf
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Room Name
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name"
                           value="{{ old('name') }}"
                           class="shadow-sm appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary"
                           required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea name="description" 
                              id="description"
                              rows="4"
                              class="shadow-sm appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary"
                              required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Price per Night ($)
                    </label>
                    <input type="number" 
                           name="price" 
                           id="price"
                           value="{{ old('price') }}"
                           step="0.01"
                           class="shadow-sm appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary"
                           required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                        Room Image
                    </label>
                    <input type="file" 
                           name="image" 
                           id="image"
                           accept="image/*"
                           class="shadow-sm appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary"
                           required>
                    <p class="text-sm text-gray-500 mt-1">Upload a high-quality image of the room (JPEG, PNG, JPG, GIF)</p>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors">
                        Create Room
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-12 mt-24">
        <div class="container mx-auto px-6">
            <p class="text-center text-gray-400">© {{ date('Y') }} Casa Bella. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>