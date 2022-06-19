<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\AdminTrait;
use App\Traits\ImageTrait;
use App\Traits\ActivityLog;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;
use function Illuminate\Session\userId;

class UserController extends Controller
{
    use ImageTrait, ActivityLog, AdminTrait;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'User',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index() // getAllUsers
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        if (Auth::user()) {
            return User::all();
        } else {
            return 'You are not allowed to do this';
        }
    }

    public function create()
    {
        $id = User::latest()->first()->id + 1;
        $parameters = ['id' => $id];
        $this->callActivityMethod('create', $parameters);
        return Inertia::render('Users/index');
    }

    public function store(StoreUserRequest $request)
    {
        $id = User::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $this->callActivityMethod('store', $parameters);
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
        $this->callActivityMethod('show', $parameters);
        $user = User::find($id);
        return ($user) ? $user = User::find($id) : 'User not Found';
    }

    public function edit(User $user)
    {
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
        $this->callActivityMethod('update', $parameters);
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
        $this->callActivityMethod('delete', $parameters);
        if ($this->isNotSuperAdmin($id)) {
<<<<<<< HEAD
          $user =  User::find($id);
            return ($user) ?    $user =  User::find($id)->delete() : 'User not Found';
=======
            $user = User::find($id);
            return ($user) ? $user = User::find($id)->delete() : 'User not Found';
>>>>>>> 72a6e7a5f4c27e668bef0fb0e160812fc94747a9
        }
        return "Super Admin Can not be Deleted";
    }

    public function restore($id) // from recycle bin
    {
        $parameters = ['id' => $id];
        $this->callActivityMethod('restore', $parameters);
        User::withTrashed()->find($id)->restore();
    }

    public function forceDelete($id) //can not be restored
    {
        $parameters = ['id' => $id];
        $this->callActivityMethod('forceDelete', $parameters);
        if ($this->isNotSuperAdmin($id)) {
            User::find($id)->forceDelete();
            return "User is Deleted successfully";
        }
        return "Super Admin Can not be Deleted";
    }
}

