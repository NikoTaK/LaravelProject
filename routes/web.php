<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController; // Import DashboardController
use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Models\Review;
use App\Http\Controllers\ReviewController;

// Welcome route
Route::get('/', function () {
    $featuredRooms = Room::where('is_featured', true)->take(3)->get();
    $latestReviews = Review::latest()->take(5)->get(); // Fetch the latest 5 reviews
    return view('welcome', compact('featuredRooms', 'latestReviews'));
})->name('home');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Reservation routes
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
});

// Room routes
Route::resource('rooms', RoomController::class);

// Review routes for viewing reviews and storing new reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/rooms/{room}/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');

require __DIR__ . '/auth.php';
