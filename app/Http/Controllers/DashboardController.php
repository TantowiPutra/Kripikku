<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Categoryheader;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id);
        if (request('name')) {
            $products = $products->where('product_name', 'LIKE', '%' . request('name') . '%');
        }
        return view('dashboard.index', [
            "title" => "My Dashboard",
            "active" => "Dashboard",
            "products" => $products->get()
        ]);
    }

    public function history()
    {
        $user = DB::table('products')
            ->where('products.user_id', auth()->user()->id)
            ->join('carts', 'carts.product_id', '=', 'products.id')
            ->where('carts.transaction_id', '!=', 'null')
            ->get();

        return view('dashboard.history', [
            'active' => 'History',
            'title' => 'History Penjualan',
            'sold_data' => $user,
            "total_income" => 0
        ]);
    }

    public function add_product_page()
    {
        return view('dashboard.CRUD.add', [
            "title" => "Add Product",
            "active" => "Dashboard",
            "categories" => Categorie::all(),
        ]);
    }

    public function update_product_page(Product $product)
    {
        $category_choosen = Categoryheader::where('product_id', $product->id)->get();
        return view('dashboard.CRUD.update', [
            "title" => "Update Product",
            "active" => "Dashboard",
            "categories" => Categorie::all(),
            "product" => $product,
            "category_choosen" => $category_choosen
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $rules = ([
            "productname" => "required|min:5|max:50",
            "productstock" =>  "required|integer",
            "productprice" => "required|integer",
            "category" => "required|array",
            "productdescription" => "required",
            "image_thumbnail" => "mimes:jpeg,jpg,png,gif",
            "image_background" => "mimes:jpeg,jpg,png,gif"
        ]);

        $validatedData = $request->validate($rules);
        if ($request->file('image_thumbnail')) {
            $validatedData['image_thumbnail'] = $request->file('image_thumbnail')->storeAs('snack_thumbnail', $request->file('image_thumbnail')->getClientOriginalName() . mt_rand(1, 200) . '.' . $request->file('image_thumbnail')->getClientOriginalExtension());
        } else {
            $validatedData['image_thumbnail'] = $request->oldImage;
        }

        if ($request->file('image_background')) {
            $validatedData['image_background'] = $request->file('image_background')->storeAs('snack_background', $request->file('image_background')->getClientOriginalName() . mt_rand(1, 200) . '.' . $request->file('image_background')->getClientOriginalExtension());
        } else {
            $validatedData['image_background'] = $request->oldImageBg;
        }

        Product::where('id', $product->id)->update([
            "product_thumbnail" => $validatedData['image_thumbnail'],
            "product_background" => $validatedData['image_background'],
            "product_name" => $validatedData['productname'],
            "product_stock" => $validatedData['productstock'],
            "product_price" => $validatedData['productprice'],
            "description" => $validatedData['productdescription'],
        ]);

        Categoryheader::where('product_id', $product->id)->delete();
        foreach ($request->category as $category) {
            if ($category) {
                Categoryheader::create([
                    "product_id" => $product->id,
                    "category_id" => $category
                ]);
            }
        }

        return redirect('/home/dashboard')->with('successUpdate', 'Sukses Mengupdate Produk!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "productname" => "required|min:5|max:50",
            "productstock" =>  "required|integer",
            "productprice" => "required|integer",
            "category" => "required|array",
            "category.*" => "required",
            "productdescription" => "required",
            "image_thumbnail" => "required|mimes:jpeg,jpg,png,gif",
            "image_background" => "required|mimes:jpeg,jpg,png,gif",
        ]);

        $product = Product::create([
            "product_thumbnail" => $request->file('image_thumbnail')->store('snack_thumbnail'),
            "product_background" => $request->file('image_background')->store('snack_background'),
            "user_id" => auth()->user()->id,
            "product_name" => $validatedData['productname'],
            "product_stock" => $validatedData['productstock'],
            "product_price" => $validatedData['productprice'],
            "description" => $validatedData['productdescription']
        ]);

        foreach ($request->category as $category) {
            Categoryheader::create([
                "product_id" => $product->id,
                "category_id" => $category
            ]);
        }

        return redirect('/home/dashboard')->with('successAdd', 'Sukses Menambahkan Produk Baru!');
    }

    public function delete(Product $product)
    {
        Product::where('id', $product->id)->where('user_id', auth()->user()->id)->update([
            "isDeleted" => "true"
        ]);

        return back()->with('successDeleteProduct', 'Produk Berhasil dihapus!');
    }

    public function print(Request $request)
    {
        $html = view('printpdf', [
            "active" => "Print",
            "invoice_id" => $request->invoice_id,
            "total_price" => $request->total_price,
            "product_name" => $request->product_name,
            "product_price" => $request->product_price,
            "product_quantity" => $request->product_quantity
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
