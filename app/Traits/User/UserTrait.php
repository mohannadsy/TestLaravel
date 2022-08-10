<?php

namespace App\Traits\User;

use App\Models\Branch;
use App\Models\PermissionGroup;
use App\Models\Trash;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Illuminate\Events\queueable;
use function Illuminate\Session\userId;


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
}
