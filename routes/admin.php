<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('admin', function () {
    return view('welcome');
});

//Route::group(['prefix' => 'admin', 'middleware' => 'guest:web', 'namespace' => 'Admin'], function () {
    //Route::get('login', [AuthController::class, 'index'])->name('login');
    //Route::post('login', [AuthController::class, 'login'])->name('admin.login');
//});

//Route::group(['prefix' => 'admin', 'middleware' => ['auth:web'], 'namespace' => 'Admin'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('developer', [DashboardController::class, 'index'])->name('about.developer');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//});

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('signin', [AdminController::class, 'adminLogin']); 
Route::post('signin', [AdminController::class, 'login'])->name('admin.login'); 

Route::get('signup', [AdminController::class, 'registerForm']);
Route::post('signup', [AdminController::class, 'register'])->name('admin.store');


Route::get('edit/{$id}', [AdminController::class, 'editform'])->name('admin.edit');
Route::post('edit/{$id}', [AdminController::class, 'update'])->name('admin.update');