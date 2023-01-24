<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            User::create([
                "image" => "user_image/example_user.png",
                "username" => $faker->name(),
                "email" => $faker->email(),
                "password" => bcrypt("123456")
            ]);
        }

        // Create Admin User
        User::create([
            "image" => "user_image/example_user.png",
            "username" => "Tantowi Putra",
            "email" => "tantowi.setiawan@binus.ac.id",
            "isAdmin" => "true",
            "password" => bcrypt("123456")
        ]);
    }
}
