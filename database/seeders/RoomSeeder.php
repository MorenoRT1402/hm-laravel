<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $count = 20): void
    {
        $faker = Faker::create();
        $rooms = [];
        
        $letters = config('params.room_floor_letters');
        $minNumber = config('params.room_floor_numbers.min');
        $maxNumber = config('params.room_floor_numbers.max');
        
        foreach (range(1, $count) as $index) {
            $room_floor = $faker->randomElement($letters) . $faker->numberBetween($minNumber, $maxNumber);
            $rooms[] = [
                'room_type' => $faker->randomElement(config('params.room_types')),
                'number' => $faker->numberBetween(0, 999),
                'picture' => $faker->imageUrl(640, 480, 'room', true),
                'bed_type' => $faker->randomElement(config('params.bed_types')),
                
                'room_floor' => $room_floor,
                
                'facilities' => json_encode($faker->randomElements(config('params.facilities')
                , $faker->numberBetween(0, 5))),
                
                'rate' => $faker->randomFloat(2, 50, 500),
                'discount' => $faker->randomFloat(2, 0, 90),
                'status' => $faker->randomElement(config('params.room_status')),
            ];
        }
        Room::insert($rooms);
    }
}
