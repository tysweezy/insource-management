<?php

class UserTableSeeder extends Seeder {

  /**
    * Run the seeder
  **/
  public function run() {

    

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 50; $i++) {

       $user = User::create(array(
         'username'       => $faker->userName,
         'first_name'     => $faker->firstName,
         'last_name'      => $faker->lastName,
         'email'          => $faker->email,
         'password'       => Hash::make($faker->word),
         'password_temp'  => '',
         'code'           => '',
         'active'         => 1 
       ));

       $user->assignRole(1);
  }

 }
  
}