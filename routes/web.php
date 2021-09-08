<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
//middleware group, laravel website middleware. routes protected
Route::get('/cart{id}',         [ProductsController::class, 'addToCart'])->name('addToCart')->middleware('auth');
Route::get('/reduce{id}',       [ProductsController::class, 'getReduceByOne'])->name('reduceByOne');
Route::get('/add{id}',          [ProductsController::class, 'getAddByOne'])->name('addByOne');
Route::get('/remove{id}',       [ProductsController::class, 'getRemoveItem'])->name('remove');
Route::get('/cart',             [ProductsController::class, 'getCart'])->name('product.cart');
Route::get('/shopping-cart',    [ProductsController::class, 'getCheckout'])->name('product.getShoppingCart');
Route::post('/shopping-cart',   [ProductsController::class, 'postCheckout'])->name('product.postShoppingCart');
Route::post('/categories',      [ProductsController::class, 'filter'])->name('categories');
Route::get('/',                 [ProductsController::class, 'index'])->name('home');

Route::get('/logout',           [LoginController::class, 'logout'])->name('own_logout');

require __DIR__ . '/auth.php';

Auth::routes();
