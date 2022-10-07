<?php

// import all controller in Controllers\API\...
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductImageController;
use App\Http\Controllers\API\KeyboardController;
use App\Http\Controllers\API\KeycapController;
use App\Http\Controllers\API\MechaSwitchController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\RatingController;
use App\Http\Controllers\API\CartController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('register', [AuthController::class, 'register']);
    Route::post('/register', [CustomerController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);    
});


Route::group([
    'middleware' => 'api',
], function($router) {
    Route::get('/customer/cart', [CartController::class, 'customerShow']);
    Route::post('/customer/cart/add-product', [CartController::class, 'customerAddProduct']);
    Route::post('/customer/cart/remove-product', [CartController::class, 'customerRemoveProduct']);
});

Route::post('/customer/{customerId}/product/{productId}', [CustomerController::class, 'toggleLovedProduct']);
Route::get('/customer/{customerId}/loved', [CustomerController::class, 'getLovedProducts']);

Route::get('/product', [ProductController::class, 'index']);

//get single product by product_id
Route::get('/product/{product_id}', [ProductController::class, 'show']);