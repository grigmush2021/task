<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FilmController;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('films')->group(function () {
        Route::get('/', [FilmController::class, 'index']);
        Route::post('/', [FilmController::class, 'store']);
        Route::post('/favourites', [FilmController::class, 'addToFavourites']);
    });

});
