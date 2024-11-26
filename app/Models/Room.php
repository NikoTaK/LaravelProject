<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'image', 'is_featured', 
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
