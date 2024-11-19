<?php

namespace App\Http\Controllers;

use App\Models\Room; // Import the Room model
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        // Fetch all rooms from the database
        $rooms = Room::all(); // You can use pagination like Room::paginate(6) if needed

        // Return the view with the rooms data
        return view('welcome', compact('rooms'));
    }
}
