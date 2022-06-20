<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Trash;
use App\Traits\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BranchController extends Controller
{
    use  ActivityLog;

    public function index() //getAllBranches
    {
        $parameters = ['id'=> null];
        $Branches = Branch::all();
        $this->callActivityMethod('getAllBranches', $parameters);
        return $Branches;
//        return Inertia::render('',compact($Branches));

    }

    public function create()
    {
        return Inertia::render('Branches/Index');
    }

    public function store(StoreBranchRequest $request)
    {
        $id=Branch::orderBy('id','desc')->first()->id+1;
        $parameters = ['request' => $request ,'id'=> $id];
        //insert to Database
        $storeBranch=Branch::create($request->all());
        if($storeBranch)
        {
          $this->callActivityMethod('store', $parameters);
          return 'store is succesfully';
        }



//        Inertia::render('',compact($data));

    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $branch =Branch::find($id);
        if ($branch) {
            $this->callActivityMethod('show', $parameters);
            return $branch;
        }
            return "branch not found";
    }

    public function edit(Branch $branch)
    {
//         render to Vue 'branches.edit'
    }

    public function update(UpdateBranchRequest $request, $id)
    {
        $paramters = ['request' => $request, 'id' => $id];
        return $branch = Branch::find($id)->update($request->all());
        $this->callActivityMethod('update', $paramters);
        if ($branch)
            return 'updated successfully';
    }

    public function delete($id) //  delete - can be restored
    {
        $paramters = ['id' => $id];
        $branch =Branch::find($id);
        if ($branch )
            if($this->isNotMainBranch($id))
            {
                $branch->delete();
                $this->callActivityMethod('delete', $paramters);
                return "Branch is deleted successfully";
            }
            else
                return "Main Branch isn't deleted";
        return "branch not found";

    }

    public function forceDelete($id) //can not be restored
    {
        $paramters = ['id' => $id];
        $branch =Branch::find($id);
        if ($branch )
            if($this->isNotMainBranch($id))
            {
                $branch->forceDelete();
                $this->callActivityMethod('forceDelete', $paramters);
                return "Branch is deleted successfully";
            }
            else
                return "Main Branch isn't deleted";
        return "branch not found";
    }

    public function restore($id) // from recycle bin
    {


//        $parameters = ['id' => $id];
//        $user =  User::withTrashed()->find($id);
//        return  $user ? $user->restore()
//            && Trash::where('table_id',$id)->delete()
//            && $this->callActivityMethod('restore', $parameters)
//            : 'User not Found in Trash';


        $paramters = ['id' => $id];
//        $branchinTrash =Trash::where('table_id','=',$id)->where('table','branches')->get();
        $branchinBranch=Branch::withTrashed()->find($id);

        if ($branchinBranch->is) {
            $branchinBranch->restore();
            $this->callActivityMethod('restore', $paramters);
            Trash::where('table_id',$id)->where('table','branches')->delete();
            return $branchinBranch;
        }
        return "branch not found";
    }

    public function isMainBranch($id)
    {
        return $id == 1;
    }

    public function isNotMainBranch($id)
    {
        return !$this->isMainBranch($id);
    }

    public function getLastCharacterInString($string)
    {
        return $string[strlen($string) - 1];
    }

    public function isLastCharacterInStringIsNumeric($string)
    {
        return is_numeric($this->getLastCharacterInString($string));
    }


    public function generateNextCodeOfPartialBranch($branch_id)
    {
        return $branch = Branch::where('branch_id', $branch_id)->last()->code + 1;
    }

    public function getMainBranch()
    {
        return $mainBranch =  DB::table('branches')
            ->whereNull('branch_id')
            ->get();

    }

    public function generateNextCodeOfMainBranch()
    {
        return $branch = $this->getMainBranch()->last()->code + 1;
    }

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'Branch',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function TreeOfMainBranch()
    {
        return $result = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();
    }

}
