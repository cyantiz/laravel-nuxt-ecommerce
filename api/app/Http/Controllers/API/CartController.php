<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.role:2')->only([
            'customerShow',
            'customerAddProduct',
            'customerRemoveProduct',
        ]);

        //admin can access and change all carts
        $this->middleware('auth.role:1')->only([
            'index',
            'show',
            'addProduct',
            'removeProduct',
        ]);
    }

    public function index()
    {
        $carts = Cart::all();
        return response()->json($carts);
    }

    public function show(Request $request)
    {
        $cart = Cart::where('customer_id', $request->customer_id)->first();

        if ($cart) {
            $products = $cart->products()->get();
            $products->transform(function ($product) {
                $product->quantity = $product->pivot->quantity;
                return $product;
            });
            return response()->json([
                'status' => 'success',
                'data' => $products,
                'message' => 'Cart loaded successfully',
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Cart not found',
        ]);
    }

    public function customerShow(Request $request)
    {
        $customer_id = $request->user()->customer->customer_id;
        $cart = Cart::where('customer_id', $customer_id)->first();
        if ($cart) {
            $products = $cart->products()->get();
            $products->transform(function ($product) {
                $product->quantity = $product->pivot->quantity;
                return $product;
            });
            return response()->json([
                'status' => 'success',
                'data' => $products,
                'message' => 'Cart of customer ' . $request->user()->customer->customer_id . ' loaded successfully',
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Cart not found',
        ]);
    }

    public function addProduct(Request $request)
    {
        $cart = Cart::where('customer_id', $request->customer_id)->first();

        if (!$cart) {
            $cart = Cart::create([
                'customer_id' => $request->customer_id,
            ]);
        }

        $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully',
        ], 200);
    }

    public function removeProduct(Request $request)
    {
        $cart = Cart::where('customer_id', $request->customer_id)->first();
        if ($cart) {
            $cart->products()->detach($request->product_id);
            return response()->json([
                'status' => 'success',
                'message' => 'Product removed from cart successfully',
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Cart not found',
        ]);
    }

    public function customerAddProduct(Request $request)
    {
        $customer_id = $request->user()->customer->customer_id;
        $cart = Cart::where('customer_id', $customer_id)->first();
        if (!$cart) {
            $cart = Cart::create([
                'customer_id' => $customer_id,
            ]);
        }
        $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully',
        ], 200);
    }

    public function customerRemoveProduct(Request $request)
    {
        $customer_id = $request->user()->customer->customer_id;
        $cart = Cart::where('customer_id', $customer_id)->first();
        if ($cart) {
            $cart->products()->detach($request->product_id);
            return response()->json([
                'status' => 'success',
                'message' => 'Product removed from cart successfully',
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Cart not found',
        ]);
    }
}
