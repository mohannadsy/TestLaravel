<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Currency\CurrencyController;
use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User'], function () {
    Route::get('index', [UserController::class, 'index']);
    Route::post('store', [UserController::class, 'store']);
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::post('update', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
});

//------- Currency ------//

Route::group(['namespace' => 'Currency','prefix'=>'currency'], function () {
    Route::get('index', [CurrencyController::class, 'index']);
    Route::post('store', [CurrencyController::class, 'store']);
    Route::get('show/{id}', [CurrencyController::class, 'show']);
    Route::post('update', [CurrencyController::class, 'update']);
    Route::get('delete/{id}', [CurrencyController::class, 'delete']);
});

//------- Debug bar ------//

Route::get('/debug-bar', function () {
    Facades\Debugbar::startMeasure('render', 'Time for rendering');
    $user = \App\Models\User::find(2);
    Facades\Debugbar::info($user);
    Facades\Debugbar::stopMeasure('render');
    return 'Debug bar';
});


