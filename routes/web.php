<?php

use Illuminate\Support\Facades\Route;

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

ray()->clearAll();
ray('Hello from routing file')->blue();
Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
