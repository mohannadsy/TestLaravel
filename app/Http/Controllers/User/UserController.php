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
    use UserTrait , ActivityLog;

    public function index() // getAllUsers
    {
        if (Auth::user()) {
            return User::all();
        } else {
            return 'you are not allowed to do this';
        }
    }

    public function create()
    {
        // render to Vue
        $this->__call('create',null);
        return  Inertia::render('Users/index');

        
    }

    public function store(StoreUserRequest $request)
    {
        $input = $request->validated();
        $input->photo = $this->getImageURL($request);;
        $input->role=$this->assignRole($request->role);
        $this->givePermissionTo($request->permissions);
        User::create($input);

        return Inertia::render('Users/index',compact($input));


    }

    public function show($id)
    {
        return User::find($id);
    }

    public function edit(User $user)
    {
        // render to Vue
    }


    public function getImageURL(Request $request){
        if ($file = $request->file('photo')) {
            $path = 'photos/users';
            $url = $this->file($file, $path, 300, 400);
        }
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $url = $this->getImageURL($request);
        $input = $request->all();
        $input->photo = $url;
        $user = User::find($id)->update($input);
        if ($user)
            return ' User updated successfully';
    }

    public function destroy($id)
    {
        if ($this->isNotSuperAdmin($id)) {
            User::find($id)->delete();
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


    public function getLastCharacterInString($string)
    {
        return $string[strlen($string) - 1];
    }

    public function isLastCharacterInStringIsNumeric($string)
    {
        return is_numeric($this->getLastCharacterInString($string));
    }

    public function increaseNumberByOne($number)
    {
        return $number = $number + 1;
    }

    public function generateNextCode($branch_id)
    {
        return $user = User::where('branch_id', $branch_id)->last()->code + 1;
    }

    public function assignRoleToUser($userId,$roleId)
    {
       $userName= User::find($userId);
       $roleName=Role::find($roleId)->name;
        $userName->assignRole($roleName);
       return 'done';
    }

    public function __call($method, $parameters)
    {
        if(method_exists($this , $method)){
            $this->makeActivity([
                'model' => 'User',
                'operation' => $method,
                'parameters' => $parameters
            ]);
            return call_user_func_array(array($this , $method) , $parameters);
        }
    }

}




