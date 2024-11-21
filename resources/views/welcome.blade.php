<x-app-layout>

    <main>
        <!-- Hero Section -->
        <div class="relative h-screen">
            <div class="absolute inset-0">
                <img src="{{ asset('images/casabella.png') }}" class="w-full h-full object-cover" alt="Casa Bella Hotel">
                <div class="absolute inset-0 bg-black opacity-30"></div>
            </div>
            <div class="relative container mx-auto px-6 h-full flex items-center pt-24">
                <div class="text-white max-w-3xl">
                    <h1 class="text-7xl font-bold mb-8">Welcome to Casa Bella</h1>
                    <p class="text-3xl mb-12 text-gray-100">Experience luxury and comfort in the heart of the city</p>
                    <a href="{{ route('rooms.index') }}" 
                       class="bg-primary text-white px-10 py-5 rounded-lg text-xl font-semibold hover:bg-primary-dark transition-colors inline-block">
                        Explore Our Rooms
                    </a>
                </div>
            </div>
        </div>



        <!-- Featured Rooms -->
        <div class="container mx-auto px-6 py-24">
            <h2 class="text-4xl font-bold mb-12 text-center">Featured Rooms</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($featuredRooms as $room)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                    <img src="{{ asset('images/deluxesuite.png') }}"
                        class="w-full h-64 object-cover"
                        alt="{{ $room->name }}">
                    <div class="p-8">
                        <h3 class="text-2xl font-semibold mb-3">{{ $room->name }}</h3>
                        <p class="text-gray-600 mb-6">{{ Str::limit($room->description, 100) }}</p>
                        <p class="text-primary text-2xl font-bold mb-6">${{ $room->price }} / night</p>
                        <a href="{{ route('rooms.show', $room) }}"
                            class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-dark transition-colors">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Latest Reviews -->
        <div class="bg-gray-50 py-24">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-bold mb-12 text-center">What Our Guests Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse($latestReviews as $review)
                    <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 rounded-full bg-gray-200 mr-4"></div>
                            <div>
                                <h4 class="font-semibold text-lg">{{ $review->user->name }}</h4>
                                <div class="text-yellow-400 text-lg">
                                    @for($i = 0; $i < $review->rating; $i++)
                                        ★
                                        @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 leading-relaxed">{{ Str::limit($review->comment, 150) }}</p>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center col-span-4">No reviews available yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
</x-app-layout>