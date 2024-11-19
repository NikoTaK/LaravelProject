<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Show the reservation form for a specific room
    public function create($room_id)
    {
        // Fetch the room by its ID
        $room = Room::findOrFail($room_id);

        // Return the reservation form view with the room data
        return view('reservations.create', compact('room'));
    }

    // Store a newly created reservation in the database
    public function store(Request $request)
    {
        // Validate the reservation input
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Create a new reservation
        $reservation = new Reservation();
        $reservation->room_id = $request->room_id;
        $reservation->check_in = $request->check_in;
        $reservation->check_out = $request->check_out;
        $reservation->save();

        // Redirect to a confirmation page or the reservation's details page
        return redirect()->route('reservations.show', $reservation->id);
    }
}
