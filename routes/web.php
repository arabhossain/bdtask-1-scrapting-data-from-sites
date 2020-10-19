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

Route::get('/', [\App\Http\Controllers\ScrapController::class, 'index']);
Route::get('/lookup', [\App\Http\Controllers\ScrapController::class, 'search']);
Route::get('/keywords', [\App\Http\Controllers\KeywordController::class, 'index']);
Route::post('/keywords', [\App\Http\Controllers\KeywordController::class, 'store']);
