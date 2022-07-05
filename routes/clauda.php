<?php

use App\Models\Account;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Branch\BranchController;
use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');


    Route::get('get-all-permissions', [UserController::class, 'getAllPermissions'])->name('user.getAllPermissions');
    Route::get('get-main-tree', [UserController::class, 'tree'])->name('user.tree');
    Route::get('get-user-permissions/{id}', [UserController::class, 'getUserPermissions'])->name('user.getUserPermissions');

});


Route::get('backup', function () {

    \Illuminate\Support\Facades\Artisan::call("php artisan backup:run");
});
//------- Currency ------//

Route::group(['namespace' => 'Currency', 'prefix' => 'currency'], function () {
    Route::get('index', [CurrencyController::class, 'index'])->name('currency.index');
    Route::post('store', [CurrencyController::class, 'store'])->name('currency.store');
    Route::get('show/{id}', [CurrencyController::class, 'show'])->name('currency.show');
    Route::post('update', [CurrencyController::class, 'update'])->name('currency.update');
    Route::get('delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
});
//------- Accounts ------//

Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
    Route::get('index', [AccountController::class, 'index'])->name('account.index');
    Route::post('store', [AccountController::class, 'store'])->name('account.store');
    Route::get('show/{id}', [AccountController::class, 'show'])->name('account.show');
    Route::post('update', [AccountController::class, 'update'])->name('account.update');
    Route::get('delete/{id}', [AccountController::class, 'delete'])->name('account.delete');
});

//------- Other Routes ------//
Route::get('last-id', function () {
//    return Account::latest()->first()->id; // flase
    return Account::orderBy('id', 'desc')->first()->id + 1; // true
});
//------- Debug bar ------//
//
//Route::get('/debug-bar', function () {
//    Facades\Debugbar::startMeasure('render', 'Time for rendering');
//    $user = \App\Models\User::find(2);
//    Facades\Debugbar::info($user);
//    Facades\Debugbar::stopMeasure('render');
//    return 'Debug bar';
//});
//
//
//
//
//
//
//Route::get('/json-test',function (){
//   return \Spatie\Permission\Models\Permission::find(1)->caption[0]['lang'];
//});

//Route::get('is-active/{id}', [UserController::class, 'isActive'])->name('user.active');

Route::get('/local',function (){
    return Config::get('app.locale');
});
