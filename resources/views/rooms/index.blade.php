<x-app-layout>
        <div class="container mx-auto px-6 py-24">
            <h2 class="text-4xl font-bold mb-12 text-center">Featured Rooms</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($featuredRooms as $room)
                    <x-featured-room :room="$room" />
                @endforeach
            </div>
        </div>
</x-app-layout>