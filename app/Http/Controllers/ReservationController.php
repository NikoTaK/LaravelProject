<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Show the reservation form for a specific room
    public function create()
    {
        $rooms = Room::all(); // Retrieve all available rooms
        return view('reservations.create', compact('rooms'));
    }

    // Store a new reservation
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:500',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'special_requests' => $request->special_requests,
            'status' => 'Pending', // Initial status
        ]);

        return redirect()->route('dashboard')->with('success', 'Your reservation has been made successfully!');
    }

    // Show a specific reservation
    public function show($id)
    {
        $reservation = Reservation::with('room')->findOrFail($id);

        // Ensure the reservation belongs to the authenticated user
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('reservations.show', compact('reservation'));
    }
}
