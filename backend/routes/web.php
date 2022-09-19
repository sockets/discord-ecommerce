<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
        ->name('products');

    Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show']);

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');
    Route::get('/customers', function () {
        return Inertia::render('Customers');
    })->name('customers');
});

require __DIR__ . '/auth.php';
