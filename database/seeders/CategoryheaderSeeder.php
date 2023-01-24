<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Categoryheader;
use Illuminate\Database\Seeder;

class CategoryheaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Categorie::all();
        $product = Product::all();
        for ($i = 0; $i < 550; $i++) {
            $category_id = mt_rand(1, $category->count());
            $product_id = mt_rand(1, $product->count());
            Categoryheader::create([
                "category_id" => $category_id,
                "product_id" => $product_id
            ]);

            // Delete Duplicate
            $dup = Categoryheader::where('category_id', $category_id)->where('product_id', $product_id);

            if ($dup->count() > 1) {
                $dup->delete(1);
            }
        }
    }
}
