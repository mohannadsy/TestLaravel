<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Image\ImageTrait;
use App\Traits\User\AdminTrait;
use App\Traits\User\UserTrait;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

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
        return User::select('id', 'name', 'code')->get();
    }

    public function store(UserRequest $request)
    {
        $id = User::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
//        dd($request);
        $request->password = Hash::make($request->password);
        $request->profile_photo_path = $this->getImageURL($request);
//        $request->role = $this->assignRole($request->role);
//      $this->givePermissionTo($request->permissions);
        $user = User::create($request->all());
        $this->callActivityMethod('store', $parameters);
        //dd($request);
        return Inertia::render('BranchAndUser/Index', compact('user'));;
    }

    public function update(UserRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $url = $this->getImageURL($request);
        $request->password = Hash::make($request['password']);
        $request->profile_photo_path = $url;
        $user = User::find($id)->update($request);
        $user->update($request->all());
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
            return User::with('permissions')->find($id);
//            return $user->permissions;
        }
        return 'User not Found';
    }


}

