<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use App\Models\PermissionGroup;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Branch\BranchTrait;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;


class BranchController extends Controller
{
    use  ActivityLog;
    use  BranchTrait;

    public function index() //getAllBranches
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('getAllBranches', $parameters);
        $branches = Branch::where('is_active', true)->select('id', 'name', 'code', 'branch_id')->get(); // auto complete
        $branchesWithUsers = Branch::whereNull('branch_id')->with(['branches'])->select('id', 'name', 'code', 'branch_id')->get();// for tree
        $groupPermissions = PermissionGroup::select('name', 'caption_' . Config::get('app.locale') . ' as caption', 'id')->with(['permissions'])->get();

//        return $groupPermissions;
        return inertia('BranchAndUser/Index', compact('branches', 'branchesWithUsers', 'groupPermissions'));
    }

    public function store(BranchRequest $request)
    {
        $id = Branch::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        //insert to Database
        $storeBranch = Branch::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return $data = 'store is succesfully';
//        return redirect()->back()->with(['store is succesfully']);
//         return Inertia::render('Branches/Index',compact($data));
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $branch = Branch::find($id);
        return $branch && $this->callActivityMethod('show', $parameters);
    }

    public function update(BranchRequest $request, $id)
    {
        $paramters = ['request' => $request, 'id' => $id];
        return $branch = Branch::find($id)->update($request->all());
        $this->callActivityMethod('update', $paramters);
        return 'updated successfully';
    }

    public function delete($id) //  delete - can be restored
    {
        $paramters = ['id' => $id];
        $branch = Branch::find($id);
        if ($this->isRootBranch($id))
            return "Root Branch isn't deleted";
        if (!$this->numOfSubBranches($id) > 0) {
            $branch->delete();
            $this->callActivityMethod('delete', $paramters);
            return "Branch is deleted successfully";
        } else
            return "it is not possible to delete a branch that contains branches within it";
    }
}
