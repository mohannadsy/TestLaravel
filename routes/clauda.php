<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User'], function () {
    Route::get('index', [UserController::class, 'index']);
    Route::post('store', [UserController::class, 'store']);
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::post('update', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
});

//------- Debug bar ------//

Route::get('/debug-bar', function () {
    Facades\Debugbar::startMeasure('render', 'Time for rendering');
    $user = \App\Models\User::find(2);
    Facades\Debugbar::info($user);
    Facades\Debugbar::stopMeasure('render');
    return 'Debug bar';
});


