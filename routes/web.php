<?php

use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES =========================================================
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::resource('users', \App\Http\Controllers\UserController::class)->only('index', 'show');
Route::resource('articles', \App\Http\Controllers\ArticleController::class)->only('index', 'show');

require __DIR__.'/auth.php';

// LOGGED IN ROUTES ======================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('home')->name('home.')->group(function () {
    Route::resource('articles', \App\Http\Controllers\Home\ArticleController::class);

});

// ADMIN ROUTES ===========================================================
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // admin routes come here
});
