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
    </div>
</x-app-layout>