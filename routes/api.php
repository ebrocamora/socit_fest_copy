<?php

use App\Http\Controllers\RewardsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth','web'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('test', function (Request $request) {
    return 'test';
});

Route::group(['middleware' => ['auth', 'web']], function() {
    Route::post('/event', [DashboardController::class, 'validateCode']);
    Route::get('/user/points', [DashboardController::class, 'getCurrentUserPoints']);

    Route::group(['prefix' => 'rewards'], function() {

        /* Rewards */
        Route::get('/', [RewardsController::class, 'index']);
        Route::get('/all', [RewardsController::class, 'loadRewards']);
        Route::get('/user/experience', [RewardsController::class, 'loadExperience']);
        Route::post('/claim/{reward}', [RewardsController::class, 'submit']);
    });
});

Route::group(['middleware' => ['web', 'auth:sanctum']], function() {
    Route::get('/user/all', [UserController::class, 'index']);
});
