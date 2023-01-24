<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categpries = ["Kacang", "Vegetarian", "Murah", "Kentang", "Singkong", "Pedas", "Gurih", "Keripik", "Manisan", "Asinan", "Kue", "Snack", "Kaya Rempah"];

        for($i = 0; $i < sizeof($categpries); $i++){
            Categorie::create([
                "category_name" => $categpries[$i]
            ]);
        }
    }
}
