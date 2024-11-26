<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Reservations Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Your Reservations</h3>
                    @if($reservations->isEmpty())
                        <p class="text-gray-500">You have no reservations at the moment. <a href="{{ route('reservations.create') }}" class="text-primary hover:underline">Book Now</a></p>
                    @else
                        <ul class="space-y-4">
                            @foreach($reservations as $reservation)
                                <li class="border p-4 rounded-lg">
                                    <h4 class="font-semibold">{{ $reservation->room->name }} - {{ $reservation->check_in }} to {{ $reservation->check_out }}</h4>
                                    <p class="text-gray-600">Status: <strong>{{ $reservation->status }}</strong></p>
                                    <a href="{{ route('reservations.show', $reservation->id) }}" class="text-blue-500 hover:underline">View Details</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>