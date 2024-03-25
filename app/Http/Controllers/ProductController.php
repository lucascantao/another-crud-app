<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index() {
        $products = Product::orderby('created_at')->get();
        return view('products.index', ['products'=> $products]);
    }

    function create() {
        return view('products.create');
    }

    function store(Request $request) {
        $product = new Product;

        // dd(request());

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->image = $file_name;
        $product->price = $request->price;
        $product->category = $request->category;

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Saved');
        

    }
}
