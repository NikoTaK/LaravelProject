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
            
                        @if ($review->user_id === Auth::id())
                            <!-- Delete Review Form -->
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition-all z-10">
                                    Delete Review
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500 text-center col-span-4">No reviews available yet.</p>
                @endforelse
            </div>
            

            <!-- Prompt to Log in for Review Submission -->
            <div class="mt-16 text-center">
                @guest
                    <p class="text-gray-500">You need to <a href="{{ route('login') }}" class="text-primary hover:underline">log in</a> to submit a review for a room.</p>
                @endguest
            </div>
        </div>
    </main>
</x-app-layout>
