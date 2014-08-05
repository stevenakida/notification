<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('fr_FR');

		foreach(range(1, 5) as $index)
		{
			Service::create([
                'name' => $faker->safeColorName
			]);
		}
	}

}
