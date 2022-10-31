<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/',[RouteController::class, 'index'])->name('home');
Route::get('/auth',[AuthController::class, 'index'])->name('auth');
Route::post('/login',[AuthController::class, 'do_login'])->name('login');
Route::post('/register',[AuthController::class, 'do_register'])->name('register');
Route::get('/logout',[AuthController::class, 'do_logout'])->name('logout');

Route::resource('products', ProductController::class);
Route::get('/category',[ProductController::class, 'category'])->name('products.category');
Route::get('/category_create',[ProductController::class, 'input_category'])->name('products.create_cat');
Route::post('/category_store',[ProductController::class, 'store_category'])->name('products_cat.store');
Route::post('/category_destroy',[ProductController::class, 'category_destoy'])->name('productscategory.destroy');
Route::get('/list-cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/add-cart',[CartController::class, 'store'])->name('cart.add');
Route::post('/delete-cart/{id}',[CartController::class, 'delete'])->name('cart.delete');
Route::get('/orders',[OrderController::class, 'index'])->name('order.index');
Route::get('/checkout',[OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store',[OrderController::class, 'store'])->name('checkout.store');

Route::resource('profile', ProductController::class);
Route::get('/history',[CartController::class, 'index'])->name('cart.index');
Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index');
Route::post('/profiles',[ProfileController::class, 'update'])->name('profile.edit');
Route::get('/friend',[ProfileController::class, 'friend'])->name('profile.friend');
Route::post('/friend_add',[ProfileController::class, 'add'])->name('profile.add');
Route::post('/friend_cancel',[ProfileController::class, 'cancel'])->name('profile.cancel');
Route::post('/friend_decline',[ProfileController::class, 'decline'])->name('profile.decline');
Route::post('/friend_accept',[ProfileController::class, 'accept'])->name('profile.accept');