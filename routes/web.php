<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Branch\BranchController;
use Barryvdh\Debugbar\Facades;

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
    return Inertia::render('Home');
});

Route::get('/login', function () {
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

//
//Route::inertia('branch', 'Branches/Index');
//Route::inertia('user', 'Users/Index');
//Route::inertia('login', 'Auth/Login');


//-------User------//

Route::group(['namespace' => 'User'], function () {
    Route::get('index', [\App\Http\Controllers\User\UserController::class, 'index']);
    Route::get('create', [\App\Http\Controllers\User\UserController::class, 'create']);
    Route::post('store', [\App\Http\Controllers\User\UserController::class, 'store']);
    Route::get('show/{id}', [\App\Http\Controllers\User\UserController::class, 'show']);
    Route::get('edit', [\App\Http\Controllers\User\UserController::class, 'edit']);
    Route::post('update', [\App\Http\Controllers\User\UserController::class, 'update']);
    Route::get('delete/{id}', [\App\Http\Controllers\User\UserController::class, 'delete']);
    Route::get('restore/{id}', [\App\Http\Controllers\User\UserController::class, 'restore']);
    Route::get('forceDelete/{id}', [\App\Http\Controllers\User\UserController::class, 'forceDelete']);


    Route::get('TreeOfMainPage', [\App\Http\Controllers\User\UserController::class, 'TreeOfMainPage']);


    Route::get('/debudbar', function () {

        Facades\Debugbar::startMeasure('render', 'Time for rendering');

        $user = \App\Models\User::find(2);
        Facades\Debugbar::info($user);

        Facades\Debugbar::stopMeasure('render');

        return 'Debugbar';
    });

});

Route::get('/debug', function () {
    try {
        throw new Exception('foobar');
    } catch (Exception $e) {
        Facades\Debugbar::addThrowable($e);
    }
    return 'debug';
});

