<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::inRandomOrder()->where('isDeleted', 'false')->limit(5)->get();
        $popular_products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.id', 'products.product_name', 'products.product_price', 'products.product_stock', 'products.product_background', 'products.product_thumbnail', DB::raw("count(products.id) as total_cart"))
            ->where('isDeleted', 'false')
            ->groupBy('products.id', 'products.product_name', 'products.product_background', 'products.product_thumbnail', 'products.product_price', 'products.product_stock')
            ->orderBy('total_cart', 'DESC')
            ->limit(5)
            ->get();

        return view('home', [
            "title" => "Home",
            "active" => "Home",
            "featured_products" => $featured,
            "popular_products" => $popular_products
        ]);
    }

    public function about()
    {
        return view('aboutus', [
            'title' => "About Us",
            "active" => "About"
        ]);
    }
}
