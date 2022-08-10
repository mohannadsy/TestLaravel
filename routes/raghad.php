<?php
use App\Models\Branch;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\PermissionGroup;

Route::inertia('raghad','BranchAndUser/TestUser');
// Route::get('raghad' , function(){
//     $branches = Branch::where('is_active', true)->select('id', 'name', 'code', 'branch_id')->get(); // auto complete
//     $branchesWithUsers = Branch::whereNull('branch_id')->with(['branches'])->select('id', 'name', 'code', 'branch_id')->get();// for tree
//     $groupPermissions = PermissionGroup::select('caption_'.Config::get('app.locale').' as caption ','id')->with(['permissions'])->get();

//        return $groupPermissions;
//     return inertia('BranchAndUser/Index', compact('branches', 'branchesWithUsers', 'groupPermissions'));

// });
// Route::inertia('rgd','Users/Index');

Route::get('nan', function(){
    $branches = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();

    return inertia('BranchAndUser/Index' , compact('branches'));

});
Route::inertia('currency','Currency/Index');

Route::get('queen' , function(){
    $parameters = ['id' => null];
        // $this->callActivityMethod('getAllBranches', $parameters);
        $branches = Branch::where('is_active', true)->select('id', 'name', 'code', 'branch_id')->get(); // auto complete
        $branchesWithUsers = Branch::whereNull('branch_id')->with(['branches'])->select('id', 'name', 'code', 'branch_id')->get();// for tree
        $groupPermissions = PermissionGroup::select('caption_'.Config::get('app.locale').' as caption ','id')->with(['permissions'])->get();
        return $groupPermissions;
});
