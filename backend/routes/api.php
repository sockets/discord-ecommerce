<?php

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


Route::group(['prefix' => 'customers', 'middleware' => ['api.auth']], function () {
    Route::post('/', [\App\Http\Controllers\CustomerController::class, 'store']);
    Route::get('/{discord}', [\App\Http\Controllers\CustomerController::class, 'getByDiscordId']);
    Route::put('/{discord}', [\App\Http\Controllers\CustomerController::class, 'update']);
    Route::get('/{discord}/orders', [\App\Http\Controllers\CustomerController::class, 'getCustomerOrders']);
    Route::get('/{discord}/orders/{order}', [\App\Http\Controllers\CustomerController::class, 'getCustomerOrder']);
    Route::post('/{discord}/checkout/{product}', [\App\Http\Controllers\StripeController::class, 'createCheckoutLink']);
});

Route::group(['prefix' => 'products', 'middleware' => ['api.auth']], function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'getProducts']);
    Route::get('/{product}', [\App\Http\Controllers\ProductController::class, 'getProduct']);
});


Route::group(['prefix' => 'webhooks'], function () {
    // Handle stripe webhooks/events
    Route::post('/stripe', [\App\Http\Controllers\StripeWebhookController::class, 'webhookHandler']);
});
