<?php

namespace App\Traits\User;

use App\Models\Branch;
use App\Models\PermissionGroup;
use App\Models\Trash;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Illuminate\Events\queueable;
use function Illuminate\Session\userId;
use function Symfony\Component\Mime\Header\all;
use function Symfony\Component\String\length;


trait  UserTrait
{

    public function getAllPermissions()
    {

        return PermissionGroup::with('permissions')->get();
    }

    public function getUserPermissions($id)
    {

        return User::find($id)->permissions;
    }

    public function tree()
    {
        return $result = Branch::with(['branches', 'users'])->whereNull('branch_id')->select('id', 'name', 'code', 'branch_id')->get();
    }

    public function forceDelete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotSuperAdmin($id)) {
            $user = User::find($id);
            return $user ? $user->forceDelete() && $this->callActivityMethod('forceDelete', $parameters) : 'User not Found';
        }
        return "Super Admin Can not be Deleted";
    }

    public function restore($id)
    {
        $parameters = ['id' => $id];
        $user = User::withTrashed()->find($id);
        return $user ? $user->restore()
            && Trash::where('table_id', $id)->delete()
            && $this->callActivityMethod('restore', $parameters)
            : 'User not Found in Trash';
    }

    public function create()
    {
        $id = User::latest()->first()->id + 1;
        $parameters = ['id' => $id];
        $this->callActivityMethod('create', $parameters);

    }

    public function isActive($id)
    {
        $user = User::find($id);
        return $user->is_active == true;
    }


    public function permissionsAccordingLang()
    {
        $groups = PermissionGroup::with('permissions')->get();
        foreach ($groups as $group) {
            if (Config::get('app.locale') == 'ar')
                $group->caption = $group->caption[0]['name'];
            if (Config::get('app.locale') == 'en')
                $group->caption = $group->caption[1]['name'];
        }
        return $groups;
    }

    public function userPermission($userId)
    {
        $groupPermissions = PermissionGroup::select('caption_' . Config::get('app.locale') . ' as caption', 'id', 'name')->with(['permissions'])->get();
        $user = User::find($userId);
        foreach ($groupPermissions as $groups) {
            foreach ($groups->permissions as $permission) {
                if ($user->hasPermissionTo($permission->name)) {
                    $permission->is_active = true;
                } else {
                    $permission->is_active = false;
                }
            }
        }
        return $groupPermissions;

    }

    public function rolePermission($roleId)
    {
        $groupPermissions = PermissionGroup::select('caption_' . Config::get('app.locale') . ' as caption', 'id', 'name')->with(['permissions'])->get();
        $role = Role::find($roleId);

        foreach ($groupPermissions as $groups) {
            foreach ($groups->permissions as $permission) {
                if ($role->hasPermissionTo($permission->name)) {
                    $permission->is_active = true;
                } else {
                    $permission->is_active = false;
                }
            }
        }
        return $groupPermissions;
//        return inertia('')

    }


    public function getLocal()
    {
        return Config::get('app.locale');
    }


    public function getRoles()
    {
        return Role::select('id', 'name')->get();
    }


    public function getUserPermissionsAccordingRole($roleId)
    {

//        return $role = Role::with(['users' => function ($q) {
//            $q->select('id', 'name')->with(['permissions' => function ($query) {
//                $query->select('name')->get();
//            }]);
//        }])->select('id', 'name')->find($roleId);


        $role = Role::find($roleId);
        $roleUsers = $role->users;
        foreach ($roleUsers as $roleUser) {
            return $roleUser->permissions;
        }


    }

    public function assignPermissionsRoleToUser($userId)
    {
        $user = User::find($userId);
        $roles = $user->roles;
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            foreach ($roles as $role) {
                foreach ($permissions as $permission) {
                    if ($user->assignRole($role->name) && $role->givePermissionTo($permission->name)) {
                        $user->givePermissionTo($permission->name);
                        return 'Done';
                    }
                }
            }
        }
    }

    public function getRolePermissions($roleId)
    {
        $role = Role::find($roleId);
        return $role->permissions;
    }


    public function branchParent($id)
    {

        $branch = Branch::with('branch')->find($id);
        return $branch->branch['code'] . ' - ' . $branch->branch['name'];

    }


    public function autoComplete($id)
    {
        $branch = Branch::find($id);

//        $branch_id = $branch->id;

//
        $all_child_branch = Branch::with('branches')->get();
        $all_child_branch_IDs = [];
        foreach ($all_child_branch as $all_child) {
            $all_child_branch_IDs[] = $all_child->id;
        }

        $branch_branch_id = $branch->branch_id;
        $childIDS = [];
//        return $branch_branch_id;
        for ($i = 0; $i < 6; $i++) {


//            print($all_child_branch_IDs[$i]);
//            print($branch_branch_id);

            if ($all_child_branch_IDs[$i] != $branch_branch_id) {
                $childIDS[] = $all_child_branch_IDs[$i];
            }

//        }
        }
        echo print_r($childIDS);
    }



//        $t=[];
//        foreach ($all_branch_ids as $all){
//             $t[] =    $all->id;
//
//
//        }
//        return $t;

//        if ($branch_id == $t[$i])

//        return $all_branch_ids[$i] ;
//        for ($i = 0; $i < 100; $i++){
//            return $all_branch_ids[$i];
//        }
//        return $all_branch_ids;

//        if ($all_branch_ids->id == $branch_id) {
//            return $all_branch_ids;
//        }
//        for ($i = 0; $i < 100; $i++){
//            return $all_branch_ids[$i];
//        }
//            return $all_branch_ids[3];

//        foreach ($all_branch_ids as $all)
//        return $all_branch_ids[$i] ;
//            = $branch_id ? $all_branch_ids[$i] : $branch_id;


//        for ($i = 0; $i < strlen($all_branch_ids); $i++) {
//            return $branch_branch_id[] = $all_branch_ids[$i][1];
//    }
//        if ($branch_id == $branch_branch_id) {
//            $branch_branch_id->$this->delete();
//        }
////        return $all_branch_ids;
//}
//    }


//
//    public function autoComplete()
//    {
//        return $this->autoComplet()
//            ->whereNot('id', '!=', 'branch_id');
//    }


//    public function generateCode($id)
//    {
//        $fullCode = '';
////        $parentNextCode = $this->getMainBranch()->last()->code + 1;
//        $parentCode = Branch::with('branch')->find($id)->branch->code;
//        $currentBranchCode = Branch::find($id)->code;
//        return $fullCode = $parentCode . '' . $currentBranchCode + 1;
//
//    }


    public
    function generateBranchesCodes($id)
    {
        $parentCode = Branch::with('branch')->find($id)->branch->code;
        $mainBranch = Branch::with('branches')->find($id);
        $branchesCodes = $mainBranch->branches->max('code');
        $max = $branchesCodes;
        for ($i = 0; $i <= strlen($max) - 1; $i++) {
            preg_match_all('!\d+!', $max, $matches);
            $num = $matches['0']['0'];
            $max = substr($max, 0, -strlen($num));
            $num = $num + 1;
            $maxNumber = $max . $num;
            print('New Item Code =  ' . $parentCode . '' . $maxNumber);
        }
    }

    public
    function generateUserCodes($id)
    {
        $parentCode = Branch::with('branch')->find($id)->branch->code;

        $mainBranch = Branch::with('users')->find($id);
        $usersCodes = $mainBranch->users->max('code');
        $max = $usersCodes;
        for ($i = 0; $i <= strlen($max) - 1; $i++) {
            preg_match_all('!\d+!', $max, $matches);
            $num = $matches['0']['0'];
            $max = substr($max, 0, -strlen($num));
            $num = $num + 1;
            $maxNumber = $max . $num;
            print('New Item Code =  ' . $parentCode . '' . $maxNumber);
        }
    }

    public
    function getLastCharacterInString($string)
    {
        return $string[strlen($string) - 1];
    }

    public
    function isLastCharacterInStringIsNumeric($string)
    {
        return is_numeric($this->getLastCharacterInString($string));
    }


    public
    function recursiveBranches($parent_id, $child_id)
    {
        $parentBranch = Branch::find($parent_id);
        $child_branch = Branch::find($child_id);
        if ($parentBranch->id == $child_branch->branch_id) {
            if ($child_branch->id == $parentBranch->branch_id) {
                return "You Can not Do it ";
            }
        }
    }


    public function reAutoComplete($id)
    {
        //----all branches----//
        $all_branches = Branch::all();
        $all_branches_IDs = [];
        foreach ($all_branches as $all) {
            $all_branches_IDs[] = $all->id;
        }

        $branch = Branch::find($id);
        $all_child_branch = Branch::with('branchesWithInternalBranches')->get();
        $all_child_branch_IDs = [];
        foreach ($all_child_branch as $all_child) {
            $all_child_branch_IDs[] = $all_child->id;
        }
        $branch_branch_id = $branch->branch_id;
        $childIDS = [];
        for ($i = 0; $i < 6; $i++) {
            if ($all_child_branch_IDs[$i] != $branch_branch_id) {
                $childIDS[] = $all_child_branch_IDs[$i];
            }

        }
        $result = array_diff($all_branches_IDs, $childIDS);
        print_r($result);
        print('-----------');
        print_r($childIDS);
        print('-----------');
        print_r($all_branches_IDs);
    }


}
