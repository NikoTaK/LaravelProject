<div
    class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-5 transition-transform duration-300">
    <a href="{{ route('rooms.show', ['room' => $room]) }}">
        <img src="{{ asset($room->image) }}" class="w-full h-64 object-cover" alt="{{ $room->name }}">

        <div class="p-8">
            <h3 class="text-2xl font-semibold mb-3">{{ $room->name }}</h3>
            <p class="text-gray-600 mb-6">{{ Str::limit($room->description, 100) }}</p>
            <p class="text-primary text-2xl font-bold mb-6">${{ $room->price }} / night</p>
        </div>
    </a>
</div>
