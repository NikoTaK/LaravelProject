<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Define table if it's different from the default 'rooms'
    // protected $table = 'rooms'; 

    // Define fillable attributes (the columns you can mass-assign)
    protected $fillable = [
        'name', 'description', 'price', 'image', 'is_featured', 
    ];

    // Optionally, you can define relationships if you have other models like reservations
    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }
}
