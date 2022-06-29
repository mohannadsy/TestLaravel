<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Account\AccountController;
use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User','prefix'=>'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});


Route::get('backup',function (){

   \Illuminate\Support\Facades\Artisan::call("php artisan backup:run");
});
//------- Currency ------//

Route::group(['namespace' => 'Currency','prefix'=>'currency'], function () {
    Route::get('index', [CurrencyController::class, 'index'])->name('currency.index');
    Route::post('store', [CurrencyController::class, 'store'])->name('currency.store');
    Route::get('show/{id}', [CurrencyController::class, 'show'])->name('currency.show');
    Route::post('update', [CurrencyController::class, 'update'])->name('currency.update');
    Route::get('delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
});
//------- Currency ------//

Route::group(['namespace' => 'Account','prefix'=>'account'], function () {
    Route::get('index', [AccountController::class, 'index'])->name('account.index');
    Route::post('store', [AccountController::class, 'store'])->name('account.store');
    Route::get('show/{id}', [AccountController::class, 'show'])->name('account.show');
    Route::post('update', [AccountController::class, 'update'])->name('account.update');
    Route::get('delete/{id}', [AccountController::class, 'delete'])->name('account.delete');
});
//------- Debug bar ------//

Route::get('/debug-bar', function () {
    Facades\Debugbar::startMeasure('render', 'Time for rendering');
    $user = \App\Models\User::find(2);
    Facades\Debugbar::info($user);
    Facades\Debugbar::stopMeasure('render');
    return 'Debug bar';
});


