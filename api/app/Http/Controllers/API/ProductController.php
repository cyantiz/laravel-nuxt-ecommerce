<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth.role:1')->only([
            'store',
            'update',
            'destroy'
        ]);
    }

    public function index()
    {
        $products = Product::withCount('lovedCustomers')->with('thumbnail')->get();
        if (count($products) > 0) {
            return response()->json($products, 200);
        } else {
            return response()->json(['message' => 'No products found'], 404);
        }
    }

    public function show($product_id)
    {
        $product = Product::withCount('lovedCustomers')->with('thumbnail')->find($product_id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        if (!$product) {
            return response()->json(['message' => 'Product not created'], 404);
        }
        return response()->json($product);
    }
    public function update(Request $request, Product $product)
    {
        if (!$product) {
            return response()->json(['message' => 'Product not updated'], 404);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not deleted'], 404);
        }
        $product->delete();
        return response()->json(null, 204);
    }
    // get all product by category
    public function getProductByCategory($category)
    {
        $products = Product::where('category', $category)->get();
        if (count($products) > 0) {
            return response()->json(['data' => $products], 200);
        } else {
            return response()->json(['message' => 'No products found'], 404);
        }
    }

    // get all product by filter (cover cases: all category, all brand, all price)
    public function getProductByFilter($request)
    {   
        $category = $request->category; 
        $brand =  $request->brand; 
        $min = $request->min;
        $max = $request->max;

        $products = Product::where('category', $category)->where('brand', $brand)->whereBetween('price', [$min, $max])->get();
        if (count($products) > 0) {
            return response()->json(['data' => $products], 200);
        } else {
            return response()->json(['message' => 'No products found'], 404);
        }
    }

    // get loved count
    public function getLovedCount($product_id)
    {
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $loved_count = $product->lovedCustomer()->count();
        return response()->json(['loved_count' => $loved_count], 200);
    }

    public function toggleLoveProduct($request)
    {
        $productId = $request->product_id;
        $userId = $request->user_id;
        if (!$productId || !$userId) {
            return response()->json(['message' => 'Product or user not found'], 404);
        }

        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $toggled = $product->loves()->toggle([$userId]);

        if (!$toggled) {
            return response()->json(['message' => 'Product love can\'t be toggled'], 404);
        }

        $loved = $toggled['attached'] ? true : false;

        return response()->json(
            [
                'success' => true,
                'data' => ["loved" => $loved],
                'message' => $loved ? ('User ' . $userId . ' liked post ' . $productId) : ('User ' . $userId . ' unliked post ' . $productId),
            ],
            200
        );
    }
}

