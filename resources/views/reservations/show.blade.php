<x-app-layout>
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold mb-8">Reservation Details</h1>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">{{ $reservation->room->name }}</h2>
            <div class="text-lg mb-2">
                <span class="font-semibold">Check-in Date:</span> {{ $reservation->check_in }}
            </div>
            <div class="text-lg mb-2">
                <span class="font-semibold">Check-out Date:</span> {{ $reservation->check_out }}
            </div>
            <div class="text-lg mb-2">
                <span class="font-semibold">Number of Guests:</span> {{ $reservation->guests }}
            </div>
            <div class="text-lg mb-4">
                <span class="font-semibold">Status:</span> <strong>{{ $reservation->status }}</strong>
            </div>

            @if($reservation->special_requests)
                <div class="text-lg font-semibold mb-2">Special Requests:</div>
                <p class="text-gray-700 mb-4">{{ $reservation->special_requests }}</p>
            @endif

            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Back to Dashboard</a>
        </div>
    </div>
</x-app-layout>
