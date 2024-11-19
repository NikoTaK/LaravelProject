<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RoomController;  // Add the RoomController
use App\Http\Controllers\ReservationController;  // Add the ReservationController
use Illuminate\Support\Facades\Route;

// Welcome route
Route::get('/', WelcomeController::class)->name('welcome');

// Article routes
Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Room routes
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');  // List rooms
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');  // View specific room

// Reservation routes
Route::middleware('auth')->group(function () {
    Route::get('/reservations/create/{room_id}', [ReservationController::class, 'create'])->name('reservations.create');  // Reservation form
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');  // Store reservation
});

require __DIR__.'/auth.php';

