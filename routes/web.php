<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('/products/add', 'showForm')->name('products.form');
    Route::post('/products/add', 'addProduct')->name('products.add');
    Route::get('/products/{product_id}/edit', 'editProduct')->name('products.edit');
    Route::put('/products/{product_id}/update', 'updateProduct')->name('products.update');
    Route::delete('/products/{product_id}/delete', 'deleteProduct')->name('products.delete');
    Route::get('/products/{product_id}/details', 'detailsProduct')->name('products.details');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders');
    Route::get('/orders/add', 'showForm')->name('orders.form');
    Route::post('/orders/add', 'addOrder')->name('orders.add');
    Route::put('/orders/{order_id}/done', 'doneOrder')->name('orders.done');
    Route::get('/orders/{order_id}/delete', 'deleteOrder')->name('orders.delete');
    Route::get('/orders/{order_id}/details', 'detailsOrder')->name('orders.details');
});

