<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/',[ProductsController::class, 'index']);
Route::get('/product/{id}',[ProductsController::class, 'product']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/',[ProductsController::class, 'index'])->name('home');
    Route::get('/product/{id}',[ProductsController::class, 'product'])->name('detail');
});
