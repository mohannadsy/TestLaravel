<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Currency\CurrencyController;
use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User','prefix'=>'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});

//------- Currency ------//

Route::group(['namespace' => 'Currency','prefix'=>'currency'], function () {
    Route::get('index', [CurrencyController::class, 'index'])->name('currency.index');
    Route::post('store', [CurrencyController::class, 'store'])->name('currency.store');
    Route::get('show/{id}', [CurrencyController::class, 'show'])->name('currency.show');
    Route::post('update', [CurrencyController::class, 'update'])->name('currency.update');
    Route::get('delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
});

//------- Debug bar ------//

Route::get('/debug-bar', function () {
    Facades\Debugbar::startMeasure('render', 'Time for rendering');
    $user = \App\Models\User::find(2);
    Facades\Debugbar::info($user);
    Facades\Debugbar::stopMeasure('render');
    return 'Debug bar';
});


