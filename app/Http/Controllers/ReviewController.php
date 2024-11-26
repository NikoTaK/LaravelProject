<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Show the latest reviews.
     */
    public function index()
    {
        $latestReviews = Review::latest()->take(8)->get();
        return view('reviews.index', compact('latestReviews'));
    }

    /**
     * Store a newly created review in the database.
     */
    public function store(Request $request)
    {
        // Validate input including room_id
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);


        // Create the review
        Review::create([
            'user_id' => Auth::id(),
            'room_id' => $validatedData['room_id'],
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }

    public function destroy($id)
    {
        // Find the review by its ID
        $review = Review::findOrFail($id);

        // Check if the authenticated user is the owner of the review
        if ($review->user_id !== Auth::id()) {
            return back()->withErrors(['msg' => 'You are not authorized to delete this review.']);
        }

        // Delete the review
        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }
}
