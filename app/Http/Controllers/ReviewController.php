<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $latestReviews = Review::latest()->take(8)->get();
        return view('reviews.index', compact('latestReviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
            'room_id' => 'required|exists:rooms,id', // Add validation for room_id
        ]);
    
        Review::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id, // Include room_id in review creation
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
    
        return back()->with('success', 'Review submitted successfully!');
    }
}