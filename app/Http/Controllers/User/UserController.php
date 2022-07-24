<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PermissionGroup;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Image\ImageTrait;
use App\Traits\User\AdminTrait;
use App\Traits\User\UserTrait;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Symfony\Component\Mime\Header\all;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    use ImageTrait, ActivityLog, AdminTrait, UserTrait;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'users',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index($roleId)
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        $user = User::select('id', 'name', 'code')->get();


        return Inertia::render('BranchAndUser/Index', compact('user'));

    }

    public function store(UserRequest $request)
    {
        $id = User::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $request->password = Hash::make($request->password);
        $request->profile_photo_path = $this->getImageURL($request);
//        $request->role = $this->assignRole($request->role);
//      $this->givePermissionTo($request->permissions);
        $user = User::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('BranchAndUser/Index', compact('user'));
    }


    public function update(UserRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $url = $this->getImageURL($request);
        $request->password = Hash::make($request['password']);
        $request->profile_photo_path = $url;
        $user = User::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }

    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotSuperAdmin($id)) {
            $user = User::find($id);
            return $user ? $user->delete() && $this->callActivityMethod('delete  ', $parameters) : 'User not Found';
        }
        return "Super Admin Can not be Deleted";
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $user = User::find($id);
        if ($user) {
            $this->callActivityMethod('show', $parameters);
//            return User::with('permissions')->find($id);
            $groupPermissions = PermissionGroup::select('caption_' . Config::get('app.locale') . ' as caption', 'id', 'name')->with(['permissions'])->get();
            foreach ($groupPermissions as $groups) {
                foreach ($groups->permissions as $permission) {
                    if ($user->hasPermissionTo($permission->name)) {
                        $permission->is_active = true;
                    } else {
                        $permission->is_active = false;
                    }
                }
            }
            return Inertia::render('BranchAndUser/show', compact('groupPermissions', 'user'));
        }
        return 'User not Found';
    }

    public function showRole($id)
    {
        $groupPermissions = PermissionGroup::select('caption_' . Config::get('app.locale') . ' as caption', 'id', 'name')->with(['permissions'])->get();
        $role = Role::find($id);

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
    }

}

