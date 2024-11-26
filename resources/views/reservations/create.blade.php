<x-app-layout>
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-8 text-center">Make a Reservation</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-6 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
            @csrf

            <!-- Room Selection -->
            <div class="mb-6">
                <label for="room_id" class="block text-lg font-semibold mb-2">Room</label>
                <select name="room_id" id="room_id" class="w-full border-gray-300 rounded-lg p-2">
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }} - ${{ $room->price }} / night</option>
                    @endforeach
                </select>
            </div>

            <!-- Check-in Date -->
            <div class="mb-6">
                <label for="check_in" class="block text-lg font-semibold mb-2">Check-in Date</label>
                <input type="date" id="check_in" name="check_in" class="w-full border-gray-300 rounded-lg p-2" min="{{ now()->toDateString() }}" required>
            </div>

            <!-- Check-out Date -->
            <div class="mb-6">
                <label for="check_out" class="block text-lg font-semibold mb-2">Check-out Date</label>
                <input type="date" id="check_out" name="check_out" class="w-full border-gray-300 rounded-lg p-2" min="{{ now()->addDay()->toDateString() }}" required>
            </div>

            <!-- Number of Guests -->
            <div class="mb-6">
                <label for="guests" class="block text-lg font-semibold mb-2">Number of Guests</label>
                <input type="number" id="guests" name="guests" min="1" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <!-- Special Requests -->
            <div class="mb-6">
                <label for="special_requests" class="block text-lg font-semibold mb-2">Special Requests (Optional)</label>
                <textarea id="special_requests" name="special_requests" rows="4" class="w-full border-gray-300 rounded-lg p-2" placeholder="Any special needs or requests?"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-primary text-black px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary-dark transition-colors w-full">
                Confirm Reservation
            </button>
        </form>
    </div>
</x-app-layout>
