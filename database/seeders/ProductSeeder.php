<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $user = User::all();
        for ($i = 0; $i < 150; $i++) {
            Product::create([
                "product_thumbnail" => "snack_thumbnail\snack_thumbnail.jpeg",
                "product_background" => "snack_background\snack_background.jpg",
                "user_id" => mt_rand(1, $user->count()),
                "product_name" => "Product - " . $i + 1,
                "product_stock" => mt_rand(1, 30),
                "product_price" => mt_rand(20000, 100000),
                "description" => $faker->text($maxNbChars = 1500)
            ]);
        }
    }
}
