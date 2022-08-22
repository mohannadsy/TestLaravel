<?php

use App\Models\Account;
use App\Models\Store;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Unit\UnitController;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Attachment\AttachmentsController;

use Barryvdh\Debugbar\Facades;


//------- Users ------//

Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {

    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('show-user-permissions/{id}', [UserController::class, 'showUserPermissions'])->name('user.showUserPermissions');
    Route::get('show-user/{id}', [UserController::class, 'showUser'])->name('user.showUser');
    Route::get('show-role/{id}', [UserController::class, 'showRole'])->name('role.show');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('userPermission/{id}', [UserController::class, 'userPermission'])->name('user.userPermission');
    Route::get('get-all-permissions', [UserController::class, 'getAllPermissions'])->name('user.getAllPermissions');
    Route::get('get-main-tree', [UserController::class, 'tree'])->name('user.tree');
    Route::get('get-user-permissions/{id}', [UserController::class, 'getUserPermissions'])->name('user.getUserPermissions');
    Route::get('get-Roles', [UserController::class, 'getRoles'])->name('user.getRoles');
    Route::get('role-permission/{id}', [UserController::class, 'rolePermission'])->name('user.rolePermission');
    Route::get('assignPermissionsRoleToUser/{id}', [UserController::class, 'assignPermissionsRoleToUser'])->name('user.assignPermissionsRoleToUser');
    Route::get('getUserPermissionsAccordingRole/{roleId}', [UserController::class, 'getUserPermissionsAccordingRole'])->name('user.getUserPermissionsAccordingRole');

    Route::get('get-role-permissions/{roleId}', [UserController::class, 'getRolePermissions'])->name('user.getRolePermissions');

        Route::get('branch-parent/{id}', [UserController::class, 'branchParent'])->name('user.branchParent');

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

    Route::get('AccountAccount/{id}', [AccountController::class, 'AccountAccount'])->name('account.AccountAccount');

});

//------- Units ------//

Route::group(['namespace' => 'Unit', 'prefix' => 'unit'], function () {
    Route::get('index', [UnitController::class, 'index'])->name('unit.index');
    Route::post('store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('show/{id}', [UnitController::class, 'show'])->name('unit.show');
    Route::post('update', [UnitController::class, 'update'])->name('unit.update');
    Route::get('delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
});

//------- Items ------//

Route::group(['namespace' => 'Item', 'prefix' => 'item'], function () {
    Route::get('index', [ItemController::class, 'index'])->name('item.index');
    Route::post('store', [ItemController::class, 'store'])->name('item.store');
    Route::get('show/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::post('update', [ItemController::class, 'update'])->name('item.update');
    Route::get('delete/{id}', [ItemController::class, 'delete'])->name('item.delete');
});

//------- Category ------//

Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
    Route::get('index', [CategoryController::class, 'index'])->name('category.index');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('show/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});


//------- Stores ------//

Route::group(['namespace' => 'Store', 'prefix' => 'store'], function () {
    Route::get('index', [StoreController::class, 'index'])->name('store.index');
    Route::post('store', [StoreController::class, 'store'])->name('store.store');
    Route::get('show/{id}', [StoreController::class, 'show'])->name('store.show');
    Route::post('update/{id}', [StoreController::class, 'update'])->name('store.update');
    Route::get('delete/{id}', [StoreController::class, 'delete'])->name('store.delete');

    Route::get('StoreAttachments/{id}', [StoreController::class, 'StoreAttachments'])->name('store.StoreAttachments');

});
Route::get('store-attachments', function () {
     $store = Store::find(1);
    return $store->attachments;
});


//------- Attachments ------//

//Route::group(['namespace' => 'Store', 'prefix' => 'attachment'], function () {
Route::get('home', [AttachmentsController::class, 'index'])->name('home');
Route::post('upload', [AttachmentsController::class, 'Upload'])->name('upload');
Route::get('show', [AttachmentsController::class, 'show'])->name('show');
Route::get('download/{file}', [AttachmentsController::class, 'download'])->name('download');
//});

Route::get('backup', function () {

    \Illuminate\Support\Facades\Artisan::call("php artisan backup:run");
});


////------- Tests ------////
//Route::get('/test23', function () {
//    return Item::find(1)->additive_IDs[0];
//});

Route::get('/item', function () {
//    return Item::find(1)->additive_IDs[1];
//    return var_dump(Account::find(1)->aggregate_ids);
//    return var_dump(Account::find(1)->distributive_ids);
//    return Item::find(1)->additive_IDs;
});


Route::put('/laravel-language/{key}', function ($key) {
    session()->put('locale', $key);
    return redirect()->back();
});


Route::get('getLocal', [UserController::class, 'getLocal'])->name('user.getLocal');


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


Route::get('/user-permission-via-role/', function () {
    $user = \App\Models\User::find(2);
// $role =\Spatie\Permission\Models\Role::find(1);
// $user->assignRole($role->name);
//    $user->getAllPermissions();
    return $user->roles->first()->permissions; //true
    // return $user->getPermissionsViaRoles(); // true
});


