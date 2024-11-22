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
            'image' => '/images/deluxesuite.png',
            'is_featured' => true
        ]);

        Room::create([
            'name' => 'Standard Room',
            'description' => 'Comfortable room with city view',
            'price' => 199.99,
            'image' => 'https://via.placeholder.com/300x200',
            'is_featured' => true
        ]);
    }
}
