<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [ProductController::class, 'index']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('addtocart', [CartController::class, 'addToCart'])->name('cart.addtocart');