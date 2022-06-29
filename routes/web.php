<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;

Route::get('/',[ProductsController::class, 'index']);
Route::get('/product/{id}',[ProductsController::class, 'product']);
Route::get('/',[ProductsController::class, 'index'])->name('home');
Route::get('/product/{id}',[ProductsController::class, 'product'])->name('detail');
Route::get('/profile',[UserController::class,'profile']);
