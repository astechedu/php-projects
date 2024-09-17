<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
//use App\Mail\MyTestEmail;
//use Illuminate\Support\Facades\Mail;

//Route::get('/', function () {
    //return view('welcome');
//});

Route::post('store', [UserController::class, 'store'])->name('user.store');

Route::get('/', [ProductController::class, 'index']);

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
//OR
/*
Route::controller(ProductCotroller::class)->group(function(){
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
*/
//Route::group(['middleware'=>'LogoutClearCache'], function() {
//});
//Cart
Route::group(['middleware'=>'auth'], function() {
	Route::get('cart', [CartController::class, 'index'])->name('cart.index');
});
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

//Payment
Route::resource('payment', PaymentController::class);

//Auth
Route::get('register', [AuthController::class, 'showRegistrationForm']);
Route::post('register', [AuthController::class, 'register'])->name('register');
 

Route::get('login', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::group(['middleware'=>'auth'], function(){
	Route::get('home', [AuthController::class, 'home'])->name('home');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//Route::prefix('cart')->group(['middleware'=>'auth'], function(){
//
//});

/*
In middleware: 
LogoutClearCache:

$response = $next($response)
$response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
$response->headers->set('Pragma','no-cache');
$response->headers->set('Expires','Sat, 01 Jan 2000 00:00:00 GMT');
return $response;
*/



//Route Groups
/*
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });
 
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});
*/

/* 
Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});
*/

//Prefix
/*
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});
*/

/*
Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
*/

/*
Route::prefix('product')->group(function(){
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
*/