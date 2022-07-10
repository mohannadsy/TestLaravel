<?php

use App\Models\Branch;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('mohannad' , function(){

// });

Route::get('mohannad', function(){
    $branches = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();
    // return inertia('BranchAndUser/Index' , compact('branches'));

    // $branches = Branch::whereNull('branch_id')->get();
    return inertia('BranchAndUser/Tree' , compact('branches'));

})->name('branch.TreeOfMainBranch');


Route::get('mohannad-test', function(){
    return $branches = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();
    // return inertia('BranchAndUser/Index' , compact('branches'));

    // $branches = Branch::whereNull('branch_id')->get();
    // return inertia('BranchAndUser/Index' , compact('branches'));

});
