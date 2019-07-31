<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset users table
        DB::table('users')->truncate();
        //generate users/authors
        $faker = Factory::create();
        DB::table('users')->insert([
            [
                'name' => "Roshan Kumar Giri",
                'email' => "roshankumar.giri19@gmail.com",
                'password' => bcrypt('12345678'),
                'slug' => "roshan-kumar-giri",
                'bio' => $faker->text(rand(250, 300)),
                'gavatar' => "img"
            ],
            [
                'name' => "Sunil Kumar Giri",
                'email' => "sunil.giri19@gmail.com",
                'password' => bcrypt('12345678'),
                'slug' => "sunil-kumar-giri",
                'bio' => $faker->text(rand(250, 300)),
                'gavatar' => "img"

            ],
            [
                'name' => "Dhiraj Giri",
                'email' => "dhiraj.giri19@gmail.com",
                'password' => bcrypt('12345678'),
                'slug' => "dhiraj-giri",
                'bio' => $faker->text(rand(250, 300)),
                'gavatar' => "img"

            ],
        ]);
    }
}
