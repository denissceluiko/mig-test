<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductRequest $request)
    {
        $products = Product::order($request->validated())->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
