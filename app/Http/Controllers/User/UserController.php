<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\PermissionGroup;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        $user = User::select('id', 'name', 'code')->get();
        return Inertia::render('BranchAndUser/Index', compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $id = User::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $request->password = Hash::make($request->password);
        $request->profile_photo_path = $this->getImageURL($request);
        $request->role = $this->assignRole($request->get('roles'));
//        $user->givePermissionTo($request->get('permissions'));
        $user = User::create($request->all());
        $user->givePermissionTo($request->get('permissions'));
        $this->callActivityMethod('store', $parameters);
//        return __('common.store');
        return redirect()->route('branch.index')->with('message', __('common.update'));


//        return inertia('BranchAndUser/Index', compact('user'))->with('message', __('common.store'));
//        return redirect()->route('branch.index')->with('message',__('common.store'));

    }


    public function update(UpdateUserRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $url = $this->getImageURL($request);
        $request->password = Hash::make($request['password']);
        $request->profile_photo_path = $url;

        if ($this->isNotSuperAdmin($id)) {
            $user = User::find($id)->update($request->all());
        } else {
            $user = User::find($id)->update($request->except('branch_id'));
        }
        $this->callActivityMethod('update', $parameters);
//        return __('common.update');
        return redirect()->route('branch.index')->with('message', __('common.update'));

    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotSuperAdmin($id)) {
            $user = User::find($id);
            if (User::find($id)) {
                $user->delete();
                $this->callActivityMethod('delete  ', $parameters);
//                return __('common.delete');

                return redirect()->route('branch.index')->with('message', __('common.delete'));

//            } else   return __('user.user not found');
                return redirect()->route('branch.index')->with('message', __('user.user not found'));

            }
//        return __('user.admin can not be deleted');
            return redirect()->route('branch.index')->with('message', __('user.admin can not be deleted'));

        }
    }


    public
    function showUserPermissions($id)
    {
        $parameters = ['id' => $id];
        $user = User::find($id);
        if ($user) {
            $this->callActivityMethod('show', $parameters);
//            return User::with('permissions')->find($id);
            $userGroupPermissions = PermissionGroup::select('caption_' . Config::get('app.locale') . ' as caption', 'id', 'name')->with(['permissions'])->get();
            foreach ($userGroupPermissions as $groups) {
                foreach ($groups->permissions as $permission) {
                    if ($user->hasPermissionTo($permission->name)) {
                        $permission->is_active = true;
                    } else {
                        $permission->is_active = false;
                    }
                }
            }
            return $userGroupPermissions;
//            return $user;
//            API
//        return redirect()->route('branch.index')->with(compact('user','groupPermissions'));


//         Inertia
        }
//        return inertia('BranchAndUser/Index', compact('groupPermissions', 'user'));

    }


    public
    function showRole($id)
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

    public
    function showUser($id)
    {
        $parameters = ['id' => $id];
        $user = User::find($id);
        if ($user) {
            return User::find($id);
            $this->callActivityMethod('show', $parameters);
        }

    }
}

