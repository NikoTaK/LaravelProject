<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default 'reservations'
    // protected $table = 'reservations';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'room_id',
        'user_id',
        'check_in',
        'check_out',
    ];

    // Define relationships (e.g., a reservation belongs to a room)
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // You can define other relationships like user if needed:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
