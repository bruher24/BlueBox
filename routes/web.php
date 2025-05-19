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
})->name('home');

Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
    Route::get('list', 'index')->name('list');
    Route::get('form/{product_id?}', 'form')->name('form');
    Route::post('create', 'create')->name('create');
    Route::put('{product_id}/update', 'update')->name('update');
    Route::delete('{product_id}/delete', 'delete')->name('delete');
    Route::get('{product_id}/details', 'details')->name('details');
});

Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
    Route::get('list', 'index')->name('list');
    Route::get('form}', 'form')->name('form');
    Route::post('create', 'create')->name('create');
    Route::put('{order_id}/complete', 'complete')->name('complete');
    Route::get('{order_id}/delete', 'delete')->name('delete');
    Route::get('{order_id}/details', 'details')->name('details');
});

