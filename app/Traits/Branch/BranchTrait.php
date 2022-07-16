<?php

namespace App\Traits\Branch;

use App\Models\Branch;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;

trait  BranchTrait
{

    public function numOfSubBranches($id)
    {
        $SubBranches = Branch::where('branch_id', $id)->get();
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
        $branch = Branch::find($id);
        if ($branch->is_active)
            return true;
        return false;
    }

    public function permissionsAccordingLang()
    {
        $permissions = PermissionGroup::select('caption_'.Config::get('app.locale').' as caption ','id')->with(['permissions'])->get();
        return $permissions;
    }


////////////////////////////////////////////////////////////////
//    public function permissionsWithLang()
//    {
//
//        $branch = Branch::find($id);
//        if ($branch)
//            if ($branch->is_active)
//                return $branch;
//            else
//                return "branch is not active";
//
//        $permission = Permission::all();
//        for ($i = 0; $i < 100; $i++) {
//            $lang = Permission::caption[$i]['lang'];
//            $name = $permission->caption[$i]['name'];
//
////            return Config::get('app.locale') == $lang;
//            return $lang . $name ;
//        }
//
////         $currentLang = Config::get('app.locale');
//
////        for ($i = 0; $i < 100; $i++) {
////            $permisson = Permission::all();
////          $item =  $permisson->caption['i']['lang'];
////          $p =   PermissionGroup::where('item', Config::get('app.locale'))->get();
//////
////        }
////        return $p;
//
//
////        PermissionGroup::where('caption[i][\'lang\']',  Config::get('app.locale'))->get();
//
////        return Config::get('app.locale') == PermissionGroup::select('caption->lang');
//
//    }

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

