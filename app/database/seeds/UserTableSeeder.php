<?php

class UserTableSeeder extends Seeder {

  /**
    * Run the seeder
  **/
  public function run() {


      DB::table('users')->delete();

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 10; $i++) {

       $user = User::create(array(
         'username'              => $faker->userName,
         'first_name'            => $faker->firstName,
         'last_name'             => $faker->lastName,
         'email'                 => $faker->email,
         'password'              => Hash::make($faker->word),
         'password_temp'         => '',
         'code'                  => '',
         'active'                => 1,
         'assigned_task_count'   => $faker->randomDigitNotNull
       ));

       $user->assignRole(1);
  }

 }
  
}