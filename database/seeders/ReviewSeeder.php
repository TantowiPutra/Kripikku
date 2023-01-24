<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        $product = Product::all();
        $faker = Faker::create();
        for ($i = 0; $i < 300; $i++) {
            $user_id = mt_rand(1, $user->count());
            $product_id = mt_rand(1, $product->count());
            Review::create([
                "user_id" => $user_id,
                "product_id" => $product_id,
                "rating" => mt_rand(1, 5),
                "comment" => $faker->text($maxNbChars = 100)
            ]);
        }
    }
}
