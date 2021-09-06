<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RewardsController;
use Illuminate\Support\Facades\Route;

/* Admin */
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [
        'auth',
        'check-ban',
        'can:role:create|role:read|role:update|role:delete',
    ]
], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function() {
        Route::get('/', [RewardsController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
        Route::get('/', [RewardsController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'rewards', 'as' => 'rewards.'], function() {
        Route::get('/', [RewardsController::class, 'index'])->name('index');
    });

});
