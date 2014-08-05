<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('fr_FR');

		foreach(range(1, 10) as $index)
		{
			Client::create([
                'name' => $faker->firstName . " " . $faker->lastName
			]);
		}
	}

}
