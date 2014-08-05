<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Schema\Blueprint;

class SubsTableSeederTableSeeder extends Seeder {

    public function run() {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('client_service')->insert(
                [
                    'client_id' => $faker->numberBetween(1,10),
                    'service_id' => $faker->numberBetween(1,5),
                    'expires_at' => $faker->dateTimeBetween('now', '3 months')
                ]
            );
        }
    }

}
