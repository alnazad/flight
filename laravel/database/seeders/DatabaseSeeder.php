<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\Passenger;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'TK 333',
            'email' => 'test@example.com',
        ]);
        Flight::factory()->create([
            'name' => 'Test User',
            'air_craft' => 'test@example.com',
            'class' => 'test@example.com',
            'fare' => 'test@example.com',
            'route' => 'test@example.com',
            'from' => 'test@example.com',
            'to' => 'test@example.com',
            'departure_time' => 'test@example.com',
            'arrival_time' => 'test@example.com',
            'duration' => 'test@example.com',
            'seat' => 'test@example.com'
        ]);
        Passenger::factory()->create([
            [
                'flight_id' => 1,
                'name' => 'Adult',
                'price' => 700,
            ],
            [
                'flight_id' => 1,
                'name' => 'child',
                'price' => 500,
            ]
        ]);
    }
}
