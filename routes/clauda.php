<?php

use App\Models\Account;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Item\ItemController;

use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
    Route::get('index/{id}', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('show-role/{id}', [UserController::class, 'showRole'])->name('role.show');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('userPermission/{id}', [UserController::class, 'userPermission'])->name('user.userPermission');
    Route::get('get-all-permissions', [UserController::class, 'getAllPermissions'])->name('user.getAllPermissions');
    Route::get('get-main-tree', [UserController::class, 'tree'])->name('user.tree');
    Route::get('get-user-permissions/{id}', [UserController::class, 'getUserPermissions'])->name('user.getUserPermissions');
});


//------- Currency ------//

Route::group(['namespace' => 'Currency', 'prefix' => 'currency'], function () {
    Route::get('index', [CurrencyController::class, 'index'])->name('currency.index');
    Route::post('store', [CurrencyController::class, 'store'])->name('currency.store');
    Route::get('show/{id}', [CurrencyController::class, 'show'])->name('currency.show');
    Route::post('update', [CurrencyController::class, 'update'])->name('currency.update');
    Route::get('delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
});

//------- Client ------//

Route::group(['namespace' => 'Client', 'prefix' => 'client'], function () {
    Route::get('index', [ClientController::class, 'index'])->name('client.index');
    Route::post('store', [ClientController::class, 'store'])->name('client.store');
    Route::get('show/{id}', [ClientController::class, 'show'])->name('client.show');
    Route::post('update', [ClientController::class, 'update'])->name('client.update');
    Route::get('delete/{id}', [ClientController::class, 'delete'])->name('client.delete');
});
//------- Accounts ------//

Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
    Route::get('index', [AccountController::class, 'index'])->name('account.index');
    Route::post('store', [AccountController::class, 'store'])->name('account.store');
    Route::get('show/{id}', [AccountController::class, 'show'])->name('account.show');
    Route::post('update', [AccountController::class, 'update'])->name('account.update');
    Route::get('delete/{id}', [AccountController::class, 'delete'])->name('account.delete');
});


//------- Items ------//

Route::group(['namespace' => 'Item', 'prefix' => 'item'], function () {
    Route::get('index', [ItemController::class, 'index'])->name('item.index');
    Route::post('store', [ItemController::class, 'store'])->name('item.store');
    Route::get('show/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::post('update', [ItemController::class, 'update'])->name('item.update');
    Route::get('delete/{id}', [ItemController::class, 'delete'])->name('item.delete');
});


//------- Stores ------//

Route::group(['namespace' => 'Store', 'prefix' => 'store'], function () {
    Route::get('index', [StoreController::class, 'index'])->name('store.index');
    Route::post('store', [StoreController::class, 'store'])->name('store.store');
    Route::get('show/{id}', [StoreController::class, 'show'])->name('store.show');
    Route::post('update', [StoreController::class, 'update'])->name('store.update');
    Route::get('delete/{id}', [StoreController::class, 'delete'])->name('store.delete');
});


Route::get('backup', function () {

    \Illuminate\Support\Facades\Artisan::call("php artisan backup:run");
});
//------- Other Routes ------//
Route::get('last-id', function () {
//    return Account::latest()->first()->id; // flase
    return Account::orderBy('id', 'desc')->first()->id + 1; // true
});

Route::get('/json-test', function () {
    return \Spatie\Permission\Models\Permission::find(1)->caption[0]['lang'];
});

//Route::get('is-active/{id}', [UserController::class, 'isActive'])->name('user.active');

Route::get('/local', function () {
    return Config::get('app.locale');
});
