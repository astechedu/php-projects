<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

//use App\Mail\MyTestEmail;
//use Illuminate\Support\Facades\Mail;

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
Route::post('addtocart', [CartController::class, 'addToCart'])->name('cart.addtocart');

Route::get('cartitems', [CartController::class, 'cartItemCount'])->name('cart.counter');
Route::delete('remove', [CartController::class, 'cartItemRemove'])->name('cart.remove');


//Sending mail to user

Route::get('sendmail', [CartController::class, 'sendmail'])->name('cart.sendmail');

//OR
//Sending Email Testing
/*
Route::get('/testroute', function() {
    $mailData['name'] = "Funny Coder";
    $mailData['title'] = "Testing Mail";
    //The email sending is done using the to method on the Mail facade
    Mail::to('ajaysisaudiya@gmail.com')->send(new MyTestEmail($mailData));
    return 'Email sent!';
});
*/
/// End of sending mail

//Event and listener testing
Route::get('usernotify', [CartController::class, 'userNotify']);
Route::get('adminnotify', [CartController::class, 'AdminNotify']);
Route::get('eventlistener', [CartController::class, 'eventlistener']);


