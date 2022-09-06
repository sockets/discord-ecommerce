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
    Route::get('/product', function () {
        return Inertia::render('Product');
    })->name('product');
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');
    Route::get('/users', function () {
        return Inertia::render('Users');
    })->name('users');
    Route::get('/keys', function () {
        return Inertia::render('Keys');
    })->name('keys');
});

require __DIR__.'/auth.php';