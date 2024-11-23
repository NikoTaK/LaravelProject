<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {

        Room::create([
            'name' => 'Standard Room',
            'description' => 'Comfortable room with city view',
            'price' => 150,
            'image' => '/images/standardroom.png',
            'is_featured' => true
        ]);

        Room::create([
            'name' => 'Superior Room',
            'description' => 'A spacious and elegantly designed room',
            'price' => 250,
            'image' => '/images/superiorroom.png',
            'is_featured' => true
        ]);
        
        Room::create([
            'name' => 'Deluxe Suite',
            'description' => 'Luxurious suite with ocean view',
            'price' => 400,
            'image' => '/images/deluxesuit.png',
            'is_featured' => true
        ]);
    }
}
