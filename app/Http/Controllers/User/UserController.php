<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    use UserTrait;
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

    }

    public function store(StoreUserRequest $request)
    {

        $file_name= $this->saveImage($request->photo,'images/users');

        User::create([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->branch_name),
            'photo'=>$file_name,
            'branch_name' => $request->branch_name,
            'role' => $request->role,
            'branch_id' => $request->branch_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'photo'=>$file_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'id_number' => $request->id_number,
        ]);

        return $request['branch_name'] = null ? $request['branch_name'] = 'Main Branch' : $request['branch_name'] = $request->branch_name;

    }

    public function show($id)
    {
        return User::find($id);
    }

    public function edit(User $user)
    {
        // render to Vue
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        User::update([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->branch_name),
            'branch_name' => $request->branch_name,
            'role' => $request->role,
            'branch_id' => $request->branch_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'id_number' => $request->id_number,
        ]);
        return $request['branch_name'] = null ? $request['branch_name'] = 'Main Branch' : $request['branch_name'] = $request->branch_name;


    }


    public function destroy($id)
    {
        User::find($id)->where('id', '!=', '1')->delete(); // 1 = super admin id


    }
}
