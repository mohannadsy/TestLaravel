<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Branch\BranchTrait;

class BranchController extends Controller
{
    use  ActivityLog;
    use  BranchTrait;

    public function index() //getAllBranches
    {
        $parameters = ['id'=> null];
        $this->callActivityMethod('getAllBranches', $parameters);
        return    Branch::all();;
//        return Inertia::render('',compact($Branches));
    }
    public function store(BranchRequest $request)
    {
        $id=Branch::orderBy('id','desc')->first()->id+1;
        $parameters = ['request' => $request ,'id'=> $id];
        //insert to Database
        $storeBranch=Branch::create($request->all());
        $this->callActivityMethod('store', $parameters);
         return $data='store is succesfully';
//        return redirect()->back()->with(['store is succesfully']);
//         return Inertia::render('Branches/Index',compact($data));
    }
    public function show($id)
    {
        $parameters = ['id' => $id];
        $branch =Branch::find($id);
        return $branch ? $branch &&  $this->callActivityMethod('show', $parameters):"branch not found" ;
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
        $branch =Branch::find($id);
        if($this->isRootBranch($id))
            return "Root Branch isn't deleted";
        if (!$this->numOfSubBranches($id)>0 )
        {
            $branch->delete();
            $this->callActivityMethod('delete', $paramters);
            return "Branch is deleted successfully";
        }
        else
            return "it is not possible to delete a branch that contains branches within it";
    }
}
