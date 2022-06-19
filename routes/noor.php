<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Branch\BranchController;



//-------Branch------//

Route::group(['namespace' => 'Branch', 'prefix' => 'branch'], function () {
    Route::get('index', [\App\Http\Controllers\Branch\BranchController::class, 'index'])->name('branch.index');
    Route::get('create', [\App\Http\Controllers\Branch\BranchController::class, 'create'])->name('branch.create');
    Route::get('show/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'show'])->name('branch.show');
    Route::post('store', [\App\Http\Controllers\Branch\BranchController::class, 'store'])->name('branch.store');
    Route::get('edit/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'edit'])->name('branch.edit');
    Route::post('update/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'update'])->name('branch.update');
    Route::get('delete/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'delete'])->name('branch.delete');
    Route::get('forceDelete/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'forceDelete'])->name('branch.forceDelete');
    Route::get('restore/{id}', [\App\Http\Controllers\Branch\BranchController::class, 'restore'])->name('branch.restore');
    Route::get('getMainBranch', [\App\Http\Controllers\Branch\BranchController::class, 'getMainBranch'])->name('branch.getMainBranch');

    Route::get('isLastCharacterInStringIsNumeric/{string}', [\App\Http\Controllers\Branch\BranchController::class, 'isLastCharacterInStringIsNumeric'])->name('branch.isLastCharacterInStringIsNumeric');


    Route::get('TreeOfMainBranch', [\App\Http\Controllers\Branch\BranchController::class, 'TreeOfMainBranch'])->name('branch.TreeOfMainBranch');

});

