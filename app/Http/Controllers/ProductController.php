<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the Products.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    /**
     * Store a newly created Product in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        Product::create($data); 

        return response()->json(null, 201);
    }

    /**
     * Display the specified Product.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified Product in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        
        $data = $request->validated();
        
        $product->update($data);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified Product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json($product);
    }
}
