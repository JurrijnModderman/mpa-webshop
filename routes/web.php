<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

// Route::get('/', 'App\Http\Controllers\ProductsController@index')->name('product');
// Route::get('/cart/{id}', 'ProductsController@addToCart')
// ->name('product.addToCart');\
// Route::get('/', [HomeController::class, 'index'])->name('product.index');
Route::get('/cart{id}',         [ProductsController::class, 'addToCart'])->name('addToCart');
Route::get('/reduce{id}',       [ProductsController::class, 'getReduceByOne'])->name('reduceByOne');
Route::get('/remove{id}',       [ProductsController::class, 'getRemoveItem'])->name('remove');
Route::get('/cart',             [ProductsController::class, 'getCart'])->name('product.cart');
Route::get('/shopping-cart',    [ProductsController::class, 'getCheckout'])->name('product.getShoppingCart');
Route::post('/shopping-cart',   [ProductsController::class, 'postCheckout'])->name('product.postShoppingCart');
Route::post('/categories',   [ProductsController::class, 'filter'])->name('categories');

Route::get('/', [ProductsController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class])->name('login');
Route::get('/register', [LoginController::class])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
