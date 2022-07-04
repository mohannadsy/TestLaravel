<?php

namespace App\Traits\Branch;

use App\Models\Branch;
use App\Models\Trash;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

trait  BranchTrait {

    public  function numOfSubBranches($id)
    {
        $SubBranches=Branch::where('branch_id',$id)->get();
        return count($SubBranches);
    }
    public function isRootBranch($id)
    {
        return $id == 1;
    }
    public function isNotRootBranch($id)
    {
        return !$this->isRootBranch($id);
    }
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'branches',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
    public function tree()
    {
        return $result = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();
    }
    public function isActive($id)
    {
        $branch=Branch::find($id);
        return $branch->active ? true :false;
    }





///.........................................
///  public function create()
//    {
//        return Inertia::render('Branches/Index');
//    }
//
//    public function edit(Branch $branch)
//    {
////         render to Vue 'branches.edit'
//    }
//    public function forceDelete($id) //can not be restored
//    {
//        $paramters = ['id' => $id];
//        $branch =Branch::find($id);
//        if($this->isRootBranch($id))
//            return "Root Branch isn't deleted";
//        if (!$this->numOfSubBranches($id)>0 )
//        {
//            $branch->forceDelete();
//            $this->callActivityMethod('forceDelete', $paramters);
//            return "Branch is deleted successfully";
//        }
//        else
//            return "it is not possible to delete a branch that contains branches within it";
//    }
//    public function restore($id) // from recycle bin
//    {
//        $paramters = ['id' => $id];
//        $branchinBranch=Branch::onlyTrashed()->find($id);
//        return $branchinBranch ? $branchinBranch->restore()
//            && $this->callActivityMethod('restore', $paramters)
//            && Trash::where('table_id',$id)->where('table','branches')->delete()
//            : 'branch not found';
//    }
//    public function generateNextCodeOfMainBranch()
//    {
//        return $branch = $this->getMainBranch()->last()->code + 1;
//    }
//    public function getLastCharacterInString($string)
//    {
//        return $string[strlen($string) - 1];
//    }
//    public function isLastCharacterInStringIsNumeric($string)
//    {
//        return is_numeric($this->getLastCharacterInString($string));
//    }
//    public function generateNextCodeOfPartialBranch($branch_id)
//    {
//        return $branch = Branch::where('branch_id', $branch_id)->last()->code + 1;
//    }
//    public function getMainBranch()
//    {
//        return $mainBranch =  DB::table('branches')
//            ->whereNull('branch_id')
//            ->get();
//    }

}
