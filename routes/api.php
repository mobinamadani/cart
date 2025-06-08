<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

///--------------------------------------------UserAuth--------------------------------------------///

Route::prefix('user')
    ->controller(\App\Http\Controllers\User\UserAuthController::class)
    ->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');

Route::middleware('auth:sanctum')
    ->controller(\App\Http\Controllers\User\UserAuthController::class)
    ->group(function () {
        Route::post('/logout', 'logout');
    });
    });

///----------------------------------------------Cart----------------------------------------------///

Route::middleware('auth:sanctum')
    ->prefix('cart')
    ->controller(\App\Http\Controllers\Cart\CartController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/add', 'add');
        Route::post('/remove', 'remove');
    });


