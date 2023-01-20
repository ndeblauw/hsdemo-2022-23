<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group( function() {
    Route::get('articles', [\App\Http\Controllers\Api\ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/{article}', [\App\Http\Controllers\Api\ArticleController::class, 'show'])->name('articles.show');
    Route::post('articles', [\App\Http\Controllers\Api\ArticleController::class, 'store'])->name('articles.store');
});

Route::post('mollie', [\App\Http\Controllers\BuyArticleController::class, 'webhook'])->name('mollie-webhook');
