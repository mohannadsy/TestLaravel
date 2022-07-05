<?php

use Illuminate\Support\Facades\Route;

//-------Branch------//

Route::group(['namespace' => 'Branch', 'prefix' => 'branch'], function () {
    Route::get('index', [\App\Http\Controllers\Branch\BranchController::class, 'index'])->name('branch.index');
    Route::post('store', [\App\Http\Controllers\Branch\BranchController::class, 'store'])->name('branch.store');
    Route::get('show/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'show'])->name('branch.show');
    Route::post('update/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'update'])->name('branch.update');
    Route::get('delete/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'delete'])->name('branch.delete');
    Route::get('isActive/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'isActive'])->name('branch.isActive');



    Route::get('permissionsWithLang', [\App\Http\Controllers\Branch\BranchController::class, 'permissionsWithLang'])->name('branch.permissionsWithLang');


});



//-------CostCenter------//

Route::group(['namespace' => 'CostCenter', 'prefix' => 'costCenter'], function () {
    Route::get('index', [\App\Http\Controllers\CostCenter\CostCenterController::class, 'index'])->name('costCenter.index');
    Route::post('store', [\App\Http\Controllers\CostCenter\CostCenterController::class, 'store'])->name('costCenter.store');
    Route::get('show/{id}', [\App\Http\Controllers\CostCenter\CostCenterController::class, 'show'])->name('costCenter.show');
    Route::post('update/{id}', [\App\Http\Controllers\CostCenter\CostCenterController::class, 'update'])->name('costCenter.update');
    Route::get('delete/{id}', [\App\Http\Controllers\CostCenter\CostCenterController::class, 'delete'])->name('costCenter.delete');
});

Route::get('get-main-tree', [\App\Http\Controllers\Branch\BranchController::class,  'tree']);
