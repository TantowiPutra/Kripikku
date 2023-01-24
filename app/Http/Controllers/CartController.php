<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Transactionheader;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $title = "My Cart";

        $myCart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('*')
            ->where('carts.user_id', '=', auth()->user()->id)
            ->where('transaction_id', '=', 'null');

        if (request('name')) {
            $myCart = $myCart->where('products.product_name', 'like', '%' . request('name') . '%');
        }

        if (request('sort')) {
            if (request('sort') == 'asc') {
                $title = "Showing Earlist Product";
                $myCart = $myCart->orderBy('carts.created_at', 'ASC');
            } else {
                $title = "Showing Newest Product";
                $myCart = $myCart->orderBy('carts.created_at', 'DESC');
            }
        }

        if (request('alph')) {
            if (request('alph') == 'asc') {
                $title = "Sorted By " . "\"" . "A-Z" . "\"";
                $myCart = $myCart->orderBy('products.product_name', 'ASC');
            } else {
                $title = "Sorted By " . "\"" . "Z-A" . "\"";
                $myCart = $myCart->orderBy('products.product_name', 'DESC');
            }
        }

        return view('cart.index', [
            "title" => $title,
            "active" => "Cart",
            "categories" => Categorie::all(),
            "total_products" => Product::all()->count(),
            "myItems" => $myCart->get(),
            "item" => ""
        ]);
    }

    public function validation(Request $request)
    {
        if ($request->checkbox == null) {
            return redirect('/home/profile/cart')->with('errorValidation', 'Failed');
        }

        for ($i = 0; $i < sizeof($request->checkbox); $i++) {
            for ($j = 0; $j < sizeof($request->product_id); $j++) {
                if ($request->checkbox[$i] == $request->product_id[$j]) {
                    Cart::where('user_id', auth()->user()->id)->where('product_id', $request->checkbox[$i])->where('transaction_id', 'null')->update([
                        'quantity' => $request->quantity[$j]
                    ]);
                    break;
                }
            }
        }

        $myCart = Cart::where('user_id', auth()->user()->id)->where('transaction_id', 'null')->get();
        return view('cart.validation', [
            'title' => 'Invoice',
            'active' => 'Invoice',
            'invoice_id' => 'WO91PQ' . chr(rand(97, 122)) . mt_rand(1, 10) . auth()->user()->id . date('Y'),
            'selected_item' => $request->checkbox,
            "myCart" => $myCart,
            "total_price" => 0
        ]);
    }

    public function validated(Request $request)
    {
        $transaction = Transactionheader::create([
            "invoice_code" => $request->invoice_id_1,
            "total_price" => $request->total_price,
            "user_id" => auth()->user()->id
        ]);

        $counter = 0;
        foreach ($request->product_id as $id) {
            Product::where('id', $id)->decrement('product_stock', $request->quantity[$counter]);
            $counter++;
        }

        $counter = 0;

        foreach ($request->product_id as $id) {
            // ddd(Cart::where('product_id', $id)->where('user_id', auth()->user()->id)->where('transaction_id', '=', 'null')->get());
            Cart::where('product_id', $id)->where('user_id', auth()->user()->id)->where('transaction_id', '=', 'null')->update([
                'transaction_id' => $transaction->id,
                'price' => $request->price[$counter],
                'quantity' => $request->quantity[$counter],
                "total_price" => $request->price[$counter] * $request->quantity[$counter],
                "user_id" => auth()->user()->id
            ]);
            $counter++;
        }

        return redirect('/home/profile/cart')->with('successTransaction', 'Sukses');
    }
}
