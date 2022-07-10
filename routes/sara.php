<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Branch;

Route::inertia('sara','BranchAndUser/Index');
Route::inertia('sara1','Home');
Route::inertia('tree','Tree/BranchTree');


Route::get('/sara' , function(){
 $results = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();
 return inertia('BranchAndUser/Index' , compact('results'));
});
