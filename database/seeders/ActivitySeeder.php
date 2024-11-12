<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;

class ActivitySeeder extends Seeder
{
    public function run(): void {
        $faker = FakerFactory::create('es_ES');
        $count = 20;
        $activities = [];

        $users = User::all();

        for ($i = 0; $i<$count; $i++){
            $activities[] = [
                'type' => $faker->randomElement(['surf', 'windsurf', 'kayak', 'atv', 'hot air balloon']),
                'datetime' => Carbon::now()->addDays(rand(1, 30)),
                'notes' => $faker->text(100),
                'user_id' => $users->random()->id,
            ];
        }
        Activity::insert($activities);
    }
}
