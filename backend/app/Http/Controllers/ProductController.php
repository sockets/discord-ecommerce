<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')
            ->paginate(5);
        return Inertia::render('Products/index', compact('products'));
    }

    public function getProducts()
    {
        $productFilter = [["status", "=", 1], ["stock", ">", 0]];
        $products = Product::where($productFilter)->get();
        $filteredProducts = collect($products)
            ->map(function ($row) {
                return [
                    'id' => $row->id,
                    'name' => $row->name,
                    'description' => $row->description,
                    'price' => $row->price,
                    'stock' => $row->stock,
                    'type' => $row->type
                ];
            });
        return response()->json([
            "productsFound" => count($filteredProducts),
            "products" => $filteredProducts,
        ], 200);
    }

    public function getProduct(Request $request)
    {
        $productId = $request->product;
        if (!isset($productId)) return response()->json(['error' => 'Missing Product ID'], 400);

        $product = Product::where('id', "=", $productId)->first();

        if ($product == null) return response()->json(['error' => 'Product Not Found'], 404);

        return response()->json([
            "product" => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'stock' => $product->stock,
                'type' => $product->type
            ],
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $product = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'status' => $product->status,
            'stripe_product' => $product->stripe_product,
            'stripe_price' => $product->stripe_price,
            'stock' => $product->stock,
            'type' => $product->type,
            'total_revenue' => $product->total_revenue(),
            'months_order_count' => $product->months_order_count(),
            'total_order_count' => $product->order_count()
        ];

        return Inertia::render('Products/product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
