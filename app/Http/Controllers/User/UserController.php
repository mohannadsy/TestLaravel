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


        User::create([
            'name' => 'Super Admin 22',
            'email' => 'superAdmin222@gmail.com',
            'password' => bcrypt('12345s222uperadmin'),
            'branch_name' => 'Main Branch',
            'role' => 'Super Admin',// مدير عام
            'branch_id' => '1',
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',


        ]);
        return 'user stored successfully';

    }

    public function store(StoreUserRequest $request)
    {
   if( $file = $request->file('image') ) {
             $path = 'Images/users';
             $url = $this->saveImage($file,$path,300,400);
         }
    //    $file_name = $this->saveImage($request->photo, 'images/users');

        User::create([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->branch_name),
            'photo' => $url,
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

    public function show($id)
    {
        return User::find($id);
    }

    public function edit(User $user)
    {
        // render to Vue
    }

    public function update(UpdateUserRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/users');

        User::update([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->branch_name),
            'branch_name' => $request->branch_name,
            'role' => $request->role,
            'photo' => $file_name,
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


        User::find($id)->where('id', '!=', '1')->delete();

//        if (!$this->isAdmin(1)) {
        // 1 = super admin id


//            return 'user deleted';
        //
//        }
//        return 'user cannot be deleted Admin';


    }

    public function isAdmin($id)
    {
        if ($id = 1) {
            return true;
        } else {
            return false;
        }
    }
}
