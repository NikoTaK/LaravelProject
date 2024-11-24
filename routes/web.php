<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Models\Review;

// Welcome route
Route::get('/', function () {
    $featuredRooms = Room::where('is_featured', true)->take(3)->get();
    $latestReviews = collect([]); // Placeholder for reviews
    return view('welcome', compact('featuredRooms', 'latestReviews'));
})->name('home');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Reservation routes
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});

// Room routes
Route::resource('rooms', RoomController::class);

require __DIR__ . '/auth.php';
