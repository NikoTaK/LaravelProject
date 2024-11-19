<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Room::create([
            'name' => 'Deluxe Suite',
            'description' => 'A spacious suite with a king-size bed and stunning views.',
            'price' => 200.00,
        ]);
    
        \App\Models\Room::create([
            'name' => 'Standard Room',
            'description' => 'A cozy room with basic amenities.',
            'price' => 100.00,
        ]);
    }
}
