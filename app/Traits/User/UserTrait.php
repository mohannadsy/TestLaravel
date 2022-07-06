<?php

namespace App\Traits\User;

use App\Models\Branch;
use App\Models\PermissionGroup;
use App\Models\Trash;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;


trait  UserTrait
{

    public function getAllPermissions()
    {
//        return Permission::with(['permissionGroup'=>function ($query){
//            $query->select('name' , 'id');
//        }])->get();
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
//        return Inertia::render('Users/index');
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
}
