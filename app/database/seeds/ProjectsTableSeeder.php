<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
      
        DB::table('projects')->delete();

		$faker = Faker::create();

		foreach(range(1, 300) as $index)
		{
			Project::create([
              'requested_month'   => $faker->monthName,
              'requester_name'    => $faker->name,
              'client_name'       => $faker->company,
              'project_number'    => $faker->numerify,
              'project_status'    => $faker->word,
              'question_count'    => $faker->randomDigitNotNull,
              'request_type'      => $faker->word,
              'complexity'        => $faker->word,
              'department'        => $faker->word,
              'notes'             => $faker->sentence,
              'qa_name'           => $faker->name,
              'hours_spent'       => $faker->randomDigitNotNull,
              'number_of_changes' => $faker->randomDigitNotNull,
              'hours_on_changes'  => $faker->randomDigitNotNull,
              'ot_hours'          => $faker->randomDigitNotNull
			]);
		}
	}

}