<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\LeasingContractController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{offer}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('manage-carts', [CartController::class, 'manage'])->name('cart.manage');
    Route::put('cart/approve/{cart}', [CartController::class, 'approve'])->name('cart.approve');
    Route::put('cart/reject/{cart}', [CartController::class, 'reject'])->name('cart.reject');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('cars', CarController::class)->only(['index']);
Route::resource('offers', OfferController::class)->only(['index']);

Route::resource('cars', CarController::class)->except(['index'])->middleware('admin');
Route::resource('offers', OfferController::class)->except(['index'])->middleware('admin');
Route::resource('contracts', LeasingContractController::class)->middleware(['auth', 'admin']);

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
