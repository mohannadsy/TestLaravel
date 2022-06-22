<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User'], function () {
    Route::get('index', [UserController::class, 'index']);
    Route::get('create', [UserController::class, 'create']);
    Route::post('store', [UserController::class, 'store']);
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::get('edit', [UserController::class, 'edit']);
    Route::post('update', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
    Route::get('restore/{id}', [UserController::class, 'restore']);
    Route::get('force-delete/{id}', [UserController::class, 'forceDelete']);
    Route::get('tree-of-main-page', [UserController::class, 'TreeOfMainPage']);
});

//------- Debug bar ------//
Route::get('/debug-bar', function () {

    Facades\Debugbar::startMeasure('render', 'Time for rendering');

    $user = \App\Models\User::find(2);
    Facades\Debugbar::info($user);

    Facades\Debugbar::stopMeasure('render');

    return 'Debug bar';
});
Route::get('/debug', function () {
    try {
        throw new Exception('foobar');
    } catch (Exception $e) {
        Facades\Debugbar::addThrowable($e);
    }
    return 'debug';
});

