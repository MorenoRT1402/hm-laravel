<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Activity::create([
                'type' => 'surf',
                'datetime' => Carbon::now()->addDays(rand(1, 30)),
                'notes' => 'Actividad de prueba',
                'user_id' => $user->id,
            ]);

            Activity::create([
                'type' => 'windsurf',
                'datetime' => Carbon::now()->addDays(rand(1, 30)),
                'notes' => 'Otra actividad de prueba',
                'user_id' => $user->id,
            ]);
        }
    }
}
