<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Branch\BranchController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


///////////////////////
Route::group(['namespace' => 'User'], function () {
    Route::get('index', [\App\Http\Controllers\User\UserController::class,'index']);
    Route::get('create', [\App\Http\Controllers\User\UserController::class,'create']);
    Route::get('show/{id}', [\App\Http\Controllers\User\UserController::class,'show']);

    Route::get('store', [\App\Http\Controllers\User\UserController::class,'store']);
    Route::get('edit', [\App\Http\Controllers\User\UserController::class,'edit']);
    Route::get('update', [\App\Http\Controllers\User\UserController::class,'update']);
    Route::get('delete/{id}', [\App\Http\Controllers\User\UserController::class,'destroy']);
});
/////////////////////////
//BranchRoute//
Route::group(['namespace' => 'Branch' , 'prefix' => 'branch'], function () {
    Route::get('index', [\App\Http\Controllers\Branch\BranchController::class,'index'])->name('branch.index');
    Route::get('create', [\App\Http\Controllers\Branch\BranchController::class,'create'])->name('branch.create');
    Route::get('show/{id}', [\App\Http\Controllers\Branch\BranchController::class,'show'])->name('branch.show');
    Route::post('store', [\App\Http\Controllers\Branch\BranchController::class,'store'])->name('branch.store');
    Route::get('edit/{id}', [\App\Http\Controllers\Branch\BranchController::class,'edit'])->name('branch.edit');
    Route::post('update/{id}', [\App\Http\Controllers\Branch\BranchController::class,'update'])->name('branch.update');
    Route::get('delete/{id}', [\App\Http\Controllers\Branch\BranchController::class,'destroy'])->name('branch.delete');
    Route::get('isLastCharacterInStringIsNumeric/{string}', [\App\Http\Controllers\Branch\BranchController::class,'isLastCharacterInStringIsNumeric'])->name('branch.isLastCharacterInStringIsNumeric');


});
