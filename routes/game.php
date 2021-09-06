<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'game',
    'middleware' => 'auth',
    'as' => 'game.'
], function() {

    Route::get('/', [GameController::class, 'index'])->name('index');
    Route::get('tracker', [GameController::class, 'tracker'])->name('points.tracker');

});
