<?php

use App\Http\Controllers\CustomRewardsController;
use App\Http\Controllers\RewardsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

/* About */
Route::group(['prefix' => 'about', 'as' => 'about.'], function() {

    Route::get('/', function() {
        return view('about.about');
    })->name('index');

    /* Organizations */
    Route::group(['prefix' => 'organization', 'as' => 'org.'], function() {
        Route::get('jpcs-apc', function() {
            return view('about.jpcs');
        })->name('jpcs');
        Route::get('jissa-apc', function() {
            return view('about.jissa');
        })->name('jissa');
        Route::get('apc-msc', function() {
            return view('about.msc');
        })->name('msc');
        Route::get('gaming-genesis', function() {
            return view('about.gaming-genesis');
        })->name('gaming-genesis');
    });
});

/* Policies */
Route::group(['prefix' => 'policies', 'as' => 'policy.'], function() {

    /* Privacy Policy */
    Route::get('privacy-policy', function() {
       return view('policy.privacy');
    })->name('privacy');

});

/* Leaderboards */
Route::get('leaderboard', function() {
    return view('dashboard.leaderboard');
})->name('leaderboard');

/* Accounts */
Route::group([
    'prefix' => 'account',
    'middleware' => [
        'auth',
        'check-ban',
    ]
], function() {

    /* Profile */
    Route::group(['as' => 'account.'], function() {

        Route::get('tracker', [DashboardController::class, 'index'])->name('tracker');

        Route::get('/', function() {
           return redirect()->route('account.me');
        });

        Route::get('me', [AccountController::class, 'redirectToUserProfile'])->name('me');

        Route::get('settings', [AccountController::class, 'settings'])->name('settings');

        Route::get('/{user}', [AccountController::class, 'index'])->name('profile');
    });

});

/* Admin */
//Route::group([
//    'prefix' => 'admin',
//    'as' => 'admin.',
//    'middleware' => [
//        'auth',
//        'check-ban',
//        'can:role:create|role:read|role:update|role:delete',
//    ]
//], function () {
//
//    Route::get('/{any}', function() {
//        return view('app');
//    })->where('any', '.*')->name('dashboard');
//
//});

/* Policies */
Route::group(['prefix' => 'policies', 'as' => 'policy.'], function() {

    Route::get('privacy-policy', function() {
        return view('policy.privacy');
    })->name('privacy-policy');

    Route::get('terms-and-conditions', function() {
        return view('policy.terms');
    })->name('terms');
});

Route::middleware('auth')->get('user/points', [DashboardController::class, 'getCurrentUserPoints']);

/* Check ban */
Route::get('banned', [AccountController::class, 'checkBan'])
    ->middleware('auth')
    ->name('account.banned');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/game.php';

