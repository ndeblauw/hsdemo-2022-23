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

// Routes for our application API - version 1
Route::middleware(['auth:sanctum'])->prefix('v1')->group( function() {
    Route::apiResource('articles', \App\Http\Controllers\Api\ArticleController::class)
        ->only(['index', 'show', 'store']);
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)->only(['index', 'show']);
});


// Routes for our application API - version 2



// Route for online payments - Mollie
Route::post('mollie', [\App\Http\Controllers\BuyArticleController::class, 'webhook'])->name('mollie-webhook');
