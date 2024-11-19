<x-site-layout title="Casa Bella Hotel - Welcome">

    <div class="container">
        <!-- Hotel Introduction -->
        <h1 class="font-bold text-3xl mt-8">Welcome to Casa Bella Hotel</h1>
        <p class="text-lg mt-4">Experience comfort and luxury at our premier hotel. Book your stay with us today!</p>

        <!-- Featured Rooms -->
        <div class="grid grid-cols-2 gap-x-8 mt-8">
            @foreach($rooms as $room)
                <a href="{{ route('rooms.show', $room->id) }}" class="mt-4">
                    <h2 class="font-bold text-lg">{{ $room->name }}</h2>
                    <div>
                        <span class="text-sm">Price: ${{ $room->price }} per night</span>
                    </div>

                    <p class="text-sm">{{ $room->description }}</p>

                    <!-- Option to book the room -->
                    <a href="{{ route('reservations.create', ['room_id' => $room->id]) }}" class="text-sm text-blue-500 hover:text-blue-700">
                        Book Now
                    </a>
                </a>
            @endforeach
        </div>
</x-site-layout>

