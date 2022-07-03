<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TopicController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::prefix('auth')->name('auth.')->group(function () {

    Route::prefix('login')->name('login.')->middleware('guest')->group(function () {
        Route::get('', [LoginController::class, 'create'])->name('form');
        Route::post('', [LoginController::class, 'store'])->name('store');
    });

    Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

    Route::prefix('register')->name('register.')->middleware('guest')->group(function () {
        Route::get('', [RegisterController::class, 'create'])->name('form');
        Route::post('', [RegisterController::class, 'store'])->name('store');
    });
});


Route::middleware('auth')->group(function () {
    Route::resource('topics', TopicController::class);
    Route::post('topics/{topic}/replies',[ReplyController::class,'store'])->name('replies.store');

    Route::prefix('badges')->name('badges.')->group(function(){
        Route::get('create',[BadgeController::class, 'create'])->name('create');
        Route::post('',[BadgeController::class, 'store'])->name('store');

    });
});
