<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = product::all();
        return view('product.index',compact(['product']));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        Product::create($request->except(['_token','submit']));
        return redirect('/product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',compact(['product']));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->except(['_token','submit']));
        return redirect('/product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
}
