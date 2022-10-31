<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests;
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



/*ADMIN*/
Route::get('/',[App\Http\Controllers\Auth\AdminController::class, 'index'])->name('nilai');
Route::post('/add_nilai',[App\Http\Controllers\Auth\AdminController::class, 'add_nilai'])->name('add_nilai');
Route::post('/delete_nilai',[App\Http\Controllers\Auth\AdminController::class, 'delete_nilai'])->name('delete_nilai');
Route::post('/edit_nilai',[App\Http\Controllers\Auth\AdminController::class, 'edit_nilai'])->name('edit_nilai');

Route::get('/grafik',[App\Http\Controllers\Auth\AdminController::class, 'grafik'])->name('grafik');

