<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES =========================================================
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::resource('users', \App\Http\Controllers\UserController::class)->only('index', 'show');
Route::resource('articles', \App\Http\Controllers\ArticleController::class)->only('index', 'show');

Route::get('/livewiretest', \App\Http\Controllers\LivewireTestController::class)->name('livewiretest');

require __DIR__.'/auth.php';

// LOGGED IN ROUTES ======================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('articles/{article}/buy/{amount}', [\App\Http\Controllers\BuyArticleController::class, 'preparePayment'])->middleware('auth')->name('prepare-payment');
Route::get('articles/{article}/success', [\App\Http\Controllers\BuyArticleController::class, 'successfulPayment'])->name('order.success');

Route::middleware(['auth', 'verified'])->prefix('home')->name('home.')->group(function () {
    Route::resource('articles', \App\Http\Controllers\Home\ArticleController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN ROUTES ===========================================================
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // admin routes come here
});
