<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Branch;
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

        return $user = User::create([
            'code' => '1',
            'name' => 'Clauda Al-Rakkad',
            'email' => 'claudaaa@gmail.com',
            'password' => bcrypt('12345aaclauda'),
            'branch_name' => 'Main Branch',
            'role' => 'Casher',
//            'photo'=>'qqq',
            'branch_id' => 'Clauda',
            'first_name' => 's',
            'middle_name' => 'Al-Rakkad',
            'last_name' => 's',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',

        ]);

    }

    public function store(StoreUserRequest $request)
    {
        if ($file = $request->file('photo')) {
            $path = 'photos/users';
            $url = $this->file($file, $path, 300, 400);
        }
        $input = $request->all();
        $input->photo = $url;
        User::create($input);
        return "User Stored Successfully ";
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function edit(User $user)
    {
        // render to Vue
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ($file = $request->file('photo')) {
            $path = 'photos/users';
            $url = $this->file($file, $path, 300, 400);
        }
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


    public function generateNextCode($branch_id){

      return  $user = User::where('branch_id' , $branch_id)->last()->code +1 ;



    }

}




