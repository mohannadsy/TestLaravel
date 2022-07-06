<?php
use App\Models\Branch;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('raghad','BranchAndUser/TestUser');
// Route::inertia('rgd','Users/Index');

Route::get('nan', function(){
    $branches = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();

    return inertia('BranchAndUser/Index' , compact('branches'));

});
