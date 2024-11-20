<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create([
            'name' => 'Deluxe Suite',
            'description' => 'Luxurious suite with ocean view',
            'price' => 299.99,
            'image_url' => 'images/rooms/deluxe-suite.jpg',
            'is_featured' => true
        ]);

        // Add more rooms as needed
    }
}
