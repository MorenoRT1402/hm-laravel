<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $count = 20): void
    {
        $faker = FakerFactory::create('es_ES');
        $bookings = [];

        $rooms = Room::all();
    
        for ($i = 0; $i<$count; $i++){
            $bookings[] = [
                'guest' => $faker->name,
                'picture' => $faker->imageUrl(640, 480, 'people', true),
                'order_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'check_in' => Carbon::parse($faker->date())->addDays(rand(1, 10))->toDateString(),
                'check_out' => Carbon::parse($faker->date())->addDays(rand(11, 20))->toDateString(),
                'discount' => $faker->randomFloat(2, 0, 50),
                'notes' => implode(' ', $faker->paragraphs(2)),
                'room_id' => $rooms->random()->id,
                'status' => collect(config('params.booking_status'))->random(),
            ];
        }
        Booking::insert($bookings);
    }
}