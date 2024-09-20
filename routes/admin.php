<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/admin/admin', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'guest:web', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:web'], 'namespace' => 'Admin'], function () {
    Route::get('/switcher', function () {
        return view('Admin.config.switcher');
    })->name('switcher');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/developer', [DashboardController::class, 'index'])->name('about.developer');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


});