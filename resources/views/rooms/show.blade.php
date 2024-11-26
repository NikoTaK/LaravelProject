<x-app-layout>
    <div class="container mx-auto px-6 py-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold mb-6">{{ $room->name }}</h1>
            <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="w-full h-80 object-cover rounded mb-6">
            <p class="text-2xl text-primary font-bold mb-4">${{ $room->price }} / night</p>
            <p class="text-gray-700 mb-6">{{ $room->description }}</p>

            <!-- Booking Button -->
            <a href="{{ route('reservations.create', ['room_id' => $room->id]) }}"
                class="bg-primary text-black px-10 py-4 rounded-lg text-lg font-semibold hover:bg-primary-dark transition-colors inline-block shadow-lg">
                Book This Room
            </a>
        </div>

        <!-- Review Submission Form -->
        @auth
            <div class="bg-gray-100 p-8 rounded-lg mt-16">
                <h3 class="text-2xl font-bold mb-4">Submit Your Review</h3>
                @if (session('success'))
                    <p class="text-green-600 mb-4">{{ session('success') }}</p>
                @endif
                <form action="{{ route('reviews.store', ['room' => $room->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <!-- Ensure this field is present and correctly populated -->
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
                        <textarea name="comment" id="comment" rows="4" class="w-full p-2 border rounded"
                            placeholder="Write your review here..." required></textarea>
                    </div>
                    <x-primary-button class="ms-3">
                        {{ __('Submit Review') }}
                    </x-primary-button>
                </form>
            </div>
        @endauth
    </div>
</x-app-layout>
