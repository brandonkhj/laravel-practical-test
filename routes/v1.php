<?php

use App\Http\Controllers\Api\V1\UserApiController;
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

Route::prefix('auth')
    ->name('api.user.')
    ->group(function () {
        Route::post('register', [UserApiController::class, 'register'])
            ->name('register');

        Route::post('login', [UserApiController::class, 'login'])
            ->name('login');
    });
