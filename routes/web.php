<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/',[ProductsController::class, 'index']);
Route::get('/product/{id}',[ProductsController::class, 'product']);
Route::get('/',[ProductsController::class, 'index'])->name('home');
Route::get('/product/{id}',[ProductsController::class, 'product'])->name('detail');

Route::get('/profile',[UserController::class,'profile'])->middleware(['auth','verified']);

Route::prefix('profile')->group(function(){
	Route::get('personal',function(){
		return view('user.personal')->with('user', Auth::user())->render();
	})->name('personal-info');
	Route::get('address',function(){
		return view('user.address')->render();
	})->name('address-list');
	Route::post('update',[UserController::class,'update']);
	Route::post('edit-phone',[UserController::class,'edit_phone']);
});
