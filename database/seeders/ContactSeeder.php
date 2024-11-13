<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $count = 20): void
    {
        $faker = FakerFactory::create('es_ES');
        $contacts = [];

        for ($i = 0; $i<$count; $i++){
            $contacts[] = [
                'date' => Carbon::now()->format('Y-m-d H:i:s'),
                'customer' => $faker->name,
                'email' => $faker->safeEmail,
                'phone' => $faker->phoneNumber,
                'subject' => $faker->sentence(3),
                'comment' => $faker->text(200),
            ];
        }
        Contact::insert($contacts);
    }
}
