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
                        class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-4 rounded-lg text-lg font-semibold shadow-lg transform hover:scale-105 hover:shadow-xl transition duration-300 ease-in-out inline-flex items-center justify-center gap-2">
                        <span>Explore Our Rooms</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>



        <!-- Featured Rooms -->
        <div class="container mx-auto px-6 py-24">
            <h2 class="text-4xl font-bold mb-12 text-center">Featured Rooms</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach ($featuredRooms as $room)
                    <x-featured-room :room="$room" />
                @endforeach
            </div>
        </div>

        <!-- Latest Reviews -->
        <div class="container mx-auto px-6 py-12">
            <h2 class="text-4xl font-bold mb-12 text-center">What Our Guests Say</h2>
    
            <!-- Display Latest Reviews -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($latestReviews as $review)
                    <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 rounded-full bg-gray-200 mr-4"></div>
                            <div>
                                <h4 class="font-semibold text-lg">{{ $review->user->name }}</h4>
                                <div class="text-yellow-400 text-lg">
                                    @for ($i = 0; $i < $review->rating; $i++)
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
    
            <!-- Review Submission Form -->
            @auth
                <div class="bg-gray-100 p-8 rounded-lg mt-16">
                    <h3 class="text-2xl font-bold mb-4">Submit Your Review</h3>
                    @if(session('success'))
                        <p class="text-green-600 mb-4">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('reviews.store', ['room' => $room->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}"> <!-- Pass the room_id -->
                        <div class="mb-4">
                            <label for="rating" class="block text-lg font-medium">Rating:</label>
                            <select name="rating" id="rating" class="w-full p-2 border rounded">
                                <option value="5">★★★★★ - Excellent</option>
                                <option value="4">★★★★ - Good</option>
                                <option value="3">★★★ - Average</option>
                                <option value="2">★★ - Poor</option>
                                <option value="1">★ - Terrible</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="comment" class="block text-lg font-medium">Comment:</label>
                            <textarea name="comment" id="comment" rows="4" class="w-full p-2 border rounded" placeholder="Write your review here..."></textarea>
                        </div>
                        <button type="submit" class="bg-primary text-black px-6 py-3 rounded-lg hover:bg-primary-dark transition-all">Submit Review</button>
                    </form>
                </div>
            @else
                <p class="mt-16 text-center text-gray-500">You need to <a href="{{ route('login') }}" class="text-primary hover:underline">log in</a> to submit a review.</p>
            @endauth
        </div>
    </main>
</x-app-layout>
