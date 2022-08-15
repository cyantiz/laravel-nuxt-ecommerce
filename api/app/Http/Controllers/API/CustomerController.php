<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use App\Modesl\User;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use FFI\Exception;

class CustomerController extends Controller
{
    // customer controller:
    public function index()
    {
        $customers = Customer::all();
        if(count($customers) > 0) {
            return response()->json(['data' => $customers], 200);
        } else {
            return response()->json(['message' => 'No customers found'], 404);
        }
    }
    public function show($email)
    {
        $customer = Customer::firstWhere('email', $email);
        if(!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        return response()->json($customer, 200);
    }
    public function store(Request $request)
    {
        $request->request->add(['role' => 2]);
        $user = AuthController::register($request);

        if($user->getStatusCode() != 201) {
            return response()->json(['message' => 'User not created'], 404);
        }
        try {
        $customer = Customer::create(
            [
                'email' => $request->email,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'province_code' => $request->province_code,
                'district_code' => $request->district_code,
                'commune_code' => $request->commune_code,
            ]
        );
        if(!$customer) {
            return response()->json(['message' => 'Customer not created'], 404);
        }
        return response()->json($customer, 200);
        } catch(Exception $e) {
            $user->user->delete();
            return response()->json(['message' => 'Customer not created'], 404);
        }
    }
    
    public function update(Request $request, Customer $customer)
    {
        if(!$customer) {
            return response()->json(['message' => 'Customer not updated'], 404);
        }
        $customer->update($request->all());
        return response()->json($customer, 200);
    }
    

    //get customer's orders by customer id
    public function getOrders($customerId)
    {
        $customer = Customer::find($customerId);
        if(!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $orders = $customer->orders;
        if(count($orders) > 0) {
            return response()->json(['data' => $orders], 200);
        } else {
            return response()->json(['message' => 'No orders found'], 404);
        }
    }

    //get customer's single order by customer id and order id
    public function getOrder($customerId, $order_id)
    {
        $customer = Customer::find($customerId);
        if(!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $order = $customer->orders()->find($order_id);
        if(!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json($order, 200);
    }

    //get user loved products
    public function getLovedProducts($customerId)
    {
        $customer = Customer::find($customerId);
        if(!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $lovedProducts = $customer->lovedProducts;
        if(count($lovedProducts) > 0) {
            return response()->json(['data' => $lovedProducts], 200);
        } else {
            return response()->json(['message' => 'No loved products found'], 404);
        }
    }
    // add/remove (toggle) product to loved list
    public function toggleLovedProduct($customerId, $productId)
    {
        $customer = Customer::find($customerId);
        if(!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $product = Product::find($productId);
        if(!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $customer->lovedProducts()->toggle($product);
        $res = [
            'loved' =>  $customer->lovedProducts()->find($productId) != null
        ];
        return response()->json($res , 200);
    }

}
