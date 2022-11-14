<?php

use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES =========================================================
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('articles', \App\Http\Controllers\ArticleController::class);

require __DIR__.'/auth.php';

// LOGGED IN ROUTES ======================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ADMIN ROUTES ===========================================================
