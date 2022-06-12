<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\UserTrait;
use App\Traits\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;


class UserController extends Controller
{
    use UserTrait, ActivityLog;

    public function index() // getAllUsers
    {
        $this->callActivity('Get All Users', null);
        if (Auth::user()) {
            return User::all();
        } else {
            return 'you are not allowed to do this';
        }
    }

    public function callActivity($method, $parameters)
    {

        $this->makeActivity([
            'table' => 'User',
            'operation' => $method,
            'parameters' => $parameters
        ]);


    }

    public function create()
    {
        // render to Vue
        return Inertia::render('Users/index');


    }

    public function store(StoreUserRequest $request)
    {
        $this->callActivity('Insert User', $request);

        $input = $request->validated();
        $input->profile_photo_path = $this->getImageURL($request);;
        $input->role = $this->assignRole($request->role);
//        $this->givePermissionTo($request->permissions);
        User::create($input);

        return Inertia::render('Users/index', compact($input));


    }

    public function show($id)
    {
        $this->callActivity('Show User', $id);

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
        $parameters = [$request, $id];
        $this->callActivity('update', $parameters);

        $url = $this->getImageURL($request);
        $input = $request->all();
        $input->profile_photo_path = $url;
        $user = User::find($id)->update($input);
        if ($user)
            return ' User updated successfully';
    }

    public function delete($id) //  delete - can be restored
    {

        $parameter = [
            'id' => $id
        ];
        $this->callActivity('delete', $parameter['id']);
        if ($this->isNotSuperAdmin($id)) {
            User::find($id)->delete();
            return "User is deleted successfully";
        }
        return "Super Admin Can not be deleted";
    }


    public function restore($id) // from recycle bin
    {
        $this->callActivity('Restore User', $id);
        User::withTrashed()->find($id)->restore();
    }

    public function forcedelete($id) //can not be restored
    {
        $this->callActivity('Force Delete User', $id);
        if ($this->isNotSuperAdmin($id)) {
            User::find($id)->forceDelete();
            return "User is deleted successfully";
        }
        return "Super Admin Can not be  deleted";
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




