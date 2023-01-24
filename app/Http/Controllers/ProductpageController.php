<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductpageController extends Controller
{
    public function index(Request $request)
    {
        $title = "Showing All Products";
        if ($request->category) {
            $category = Categorie::where('id', $request->category)->first();
            $title = "Showing Category: " . "\"" . $category->category_name . "\"";
        }

        $products = Product::ProductFilter(['category' => request('category'), 'name' => request('name')]);

        if ($request->sort) {
            if ($request->sort == 'asc') {
                $title = "Showing Earlist Product";
                $products = $products->orderBy('created_at', 'ASC');
            } else {
                $title = "Showing Newest Product";
                $products = $products->orderBy('created_at', 'DESC');
            }
        }

        if ($request->alph) {
            if ($request->alph == 'asc') {
                $title = "Sorted By " . "\"" . "A-Z" . "\"";
                $products = $products->orderBy('product_name', 'ASC');
            } else {
                $title = "Sorted By " . "\"" . "Z-A" . "\"";
                $products = $products->orderBy('product_name', 'DESC');
            }
        }

        return view('product.index', [
            "title" => $title,
            "active" => "All Products",
            "categories" => Categorie::all(),
            "products" => $products->where('isDeleted', '!=', 'true')->where('product_stock', '>', '0')->paginate(6),
            "total_products" => Product::all()->count(),
        ]);
    }

    public function detail(Product $product)
    {
        $average_rating = DB::table('reviews')
            ->where('product_id', $product->id)
            ->select(DB::raw("AVG(reviews.rating) as total_rating"))
            ->groupBy('product_id')
            ->first();

        $review = Review::where('product_id', $product->id)->limit(5)->latest()->get();
        if (auth()->user()) {
            $isComment = Review::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first();
            $isCart = Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->where('transaction_id', 'null')->first();
        } else {
            $isComment = "";
            $isCart = "";
        }
        return view('product.detail', [
            "title" => $product->name,
            "active" => $product->name,
            "product" => $product,
            "total_rating" => $average_rating,
            "review" => $review,
            "isComment" => $isComment,
            "isCart" => $isCart,
            "moreItems" => Product::take(10)->inRandomOrder()->get()
        ]);
    }

    public function addComment(Product $product, Request $request)
    {
        $request->validate([
            "rating" => 'required',
            "comment" => 'required'
        ]);

        Review::create([
            "user_id" => $request->id,
            "product_id" => $product->id,
            "comment" => $request->comment,
            "rating" => $request->rating
        ]);

        return back()->with('successAddKomen', 'Komen berhasil ditambahkan!');
    }

    public function deleteComment(Product $product, Request $request)
    {
        Review::where('user_id', $request->id)->where('product_id', $product->id)->delete();
        return back()->with('successDeleteKomen', 'Komen berhasil dihapus!');
    }

    public function addCart(Product $product, Request $request)
    {
        Cart::create([
            "user_id" => auth()->user()->id,
            "product_id" => $product->id,
            "quantity" => 1
        ]);

        return back()->with('succesAddCart', 'Sukses menambahkan produk');
    }

    public function removeCart(Product $product, Request $request)
    {
        Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->delete();
        return back()->with('successDeleteCart', 'Sukses remove produk');
    }
}
