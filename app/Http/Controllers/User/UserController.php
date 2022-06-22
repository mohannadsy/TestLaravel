<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Image\ImageTrait;
use App\Traits\User\AdminTrait;
use App\Traits\User\UserTrait;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

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
        return User::all();
    }

    public function store(StoreUserRequest $request)
    {
        $id = User::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $input = $request->validated();
        $input->password = Hash::make($input['password']);
        $input->profile_photo_path = $this->getImageURL($request);;
        $input->role = $this->assignRole($request->role);
//      $this->givePermissionTo($request->permissions);
        User::create($input);
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('Users/index', compact($input));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $url = $this->getImageURL($request);
        $input = $request->validated(); //   $input = $request->all();
        $input->password = Hash::make($input['password']);
        $input->profile_photo_path = $url;
        $user = User::find($id)->update($input);
        return $user ? $user->update($input) && $this->callActivityMethod('update', $parameters) : "User Not Found";
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
        $this->callActivityMethod('show', $parameters);
        $user = User::find($id);
        return $user ? $user = User::find($id) : 'User not Found';
    }
}

