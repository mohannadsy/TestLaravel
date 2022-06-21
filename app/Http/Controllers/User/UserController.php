<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Trash;
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
            'table' => 'users',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
            $this->callActivityMethod('index', $parameters);
            return User::all();
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
        $input = $request->validated();
        $input->profile_photo_path = $this->getImageURL($request);;
        $input->role = $this->assignRole($request->role);
//      $this->givePermissionTo($request->permissions);
        User::create($input);
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('Users/index', compact($input));
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $this->callActivityMethod('show', $parameters);
        $user = User::find($id);
        return ($user) ? $user = User::find($id) : 'User not Found';
    }

    public function edit(User $user){}

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
        $url = $this->getImageURL($request);
        $input = $request->all();
        $input->profile_photo_path = $url;
        $user = User::find($id)->update($input);
        if ($user)
            $this->callActivityMethod('update', $parameters);
            return 'User Updated Successfully';
    }

    public function delete($id) //  delete - can be restored
    {
        $parameters = ['id' => $id];
        if ($this->isNotSuperAdmin($id)) {
            $user = User::find($id);
            return  $user? $user->delete() && $this->callActivityMethod('delete', $parameters) : 'User not Found';
        }
        return "Super Admin Can not be Deleted";
    }

    public function restore($id) // from recycle bin
    {
        $parameters = ['id' => $id];
        $user =  User::withTrashed()->find($id);
        return  $user ? $user->restore()
            && Trash::where('table_id',$id)->delete()
            && $this->callActivityMethod('restore', $parameters)
            : 'User not Found in Trash';
    }

    public function forceDelete($id) //can not be restored
    {
        $parameters = ['id' => $id];
        if ($this->isNotSuperAdmin($id)) {
            $user = User::find($id);
            return  $user ? $user->forceDelete() && $this->callActivityMethod('forceDelete', $parameters) : 'User not Found';
        }
        return "Super Admin Can not be Deleted";
    }


    public function testForceDelete($id) //can not be restored
    {
        $parameters = ['id' => $id];
        if ($this->isNotSuperAdmin($id)) {
            $branch = User::with('branch')->get();
            $user = User::whereNull('branch')->find($id);
            return  $user ? $user->forceDelete() && $this->callActivityMethod('forceDelete', $parameters) : 'User not Found';
        }
        return "Super Admin Can not be Deleted";
    }
}

