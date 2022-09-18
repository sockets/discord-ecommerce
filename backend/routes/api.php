<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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


Route::group(['prefix' => 'customers', 'middleware' => ['api.auth']], function () {
    Route::post('/', [CustomerController::class, 'store']);
    Route::get('/{discord}', [CustomerController::class, 'show']);
    Route::put('/{discord}', [CustomerController::class, 'update']);
    Route::get('/{discord}/orders', [CustomerController::class, 'getCustomerOrders']);
    Route::get('/{discord}/orders/{order}', [CustomerController::class, 'getCustomerOrder']);
});

Route::group(['prefix' => 'products', 'middleware' => ['api.auth']], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
});
