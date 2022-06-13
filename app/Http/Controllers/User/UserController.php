<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\ImageTrait;
use App\Traits\ActivityLog;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;


class UserController extends Controller
{
    use ImageTrait, ActivityLog;

    public function callActivity($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'User',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index() // getAllUsers
    {
        $this->callActivity('index', null);
        if (Auth::user()) {
            return User::all();
        } else {
            return 'You are not allowed to do this';
        }
    }

    public function create()
    {
        $id =  User::latest()->first()->id + 1;
        $parameters = ['id' => $id];
        $this->callActivity('create', $parameters);
        return Inertia::render('Users/index');
    }

    public function store(StoreUserRequest $request)
    {
        $id = User::last()->id;
        $parameters = ['request' => $request, 'id' => $id];
        $this->callActivity('store', $parameters);
        $input = $request->validated();
        $input->profile_photo_path = $this->getImageURL($request);;
        $input->role = $this->assignRole($request->role);
//        $this->givePermissionTo($request->permissions);
        User::create($input);

        return Inertia::render('Users/index', compact($input));
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $this->callActivity('show', $parameters);
        return User::find($id);
    }

    public function edit(User $user)
    {
        // render to Vue
    }

    public function getImageURL(Request $request)
    {
        if ($file = $request->file('profile_photo_path')) {
            $path = 'photos/users';
            $url = $this->file($file, $path, 300, 400);
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $this->callActivity('update', $parameters);
        $url = $this->getImageURL($request);
        $input = $request->all();
        $input->profile_photo_path = $url;
        $user = User::find($id)->update($input);
        if ($user)
            return 'User Updated Successfully';
    }

    public function delete($id) //  delete - can be restored
    {
        $parameters = ['id' => $id];
        $this->callActivity('delete', $parameters);
        if ($this->isNotSuperAdmin($id)) {
            User::find($id)->delete();
            return "User is Deleted successfully";
        }
        return "Super Admin Can not be Deleted";
    }


    public function restore($id) // from recycle bin
    {
        $parameters = ['id' => $id];
        $this->callActivity('restore', $parameters);
        User::withTrashed()->find($id)->restore();
    }

    public function forceDelete($id) //can not be restored
    {
        $parameters = ['id' => $id];
        $this->callActivity('forceDelete', $parameters);
        if ($this->isNotSuperAdmin($id)) {
            User::find($id)->forceDelete();
            return "User is Deleted successfully";
        }
        return "Super Admin Can not be Deleted";
    }

    public function isSuperAdmin($id)
    {
        return $id == 1;
    }

    public function isNotSuperAdmin($id)
    {
        return !$this->isSuperAdmin($id);
    }
}

