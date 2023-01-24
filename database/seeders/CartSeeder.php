<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
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
        for ($i = 0; $i < 150; $i++) {
            $user_id = mt_rand(1, $user->count());
            $product_id = mt_rand(1, $product->count());
            Cart::create([
                "user_id" => $user_id,
                "product_id" => $product_id,
                "quantity" => 1
            ]);

            $dup = Cart::where('user_id', $user_id)->where('product_id', $product_id);
            if ($dup->count() > 1) {
                $dup->delete(1);
            }
        }
    }
}
