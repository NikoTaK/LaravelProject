<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Display a listing of the rooms
    public function index()
    {
        // Fetch all rooms from the database
        $rooms = Room::all();

        // Return the 'rooms.index' view with the rooms data
        return view('rooms.index', compact('rooms'));
    }

    // Display the details of a specific room
    public function show($id)
    {
        // Fetch the specific room from the database by its ID
        $room = Room::findOrFail($id);

        // Return the 'rooms.show' view with the room data
        return view('rooms.show', compact('room'));
    }
}
