<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $rules = [
            'code' => 'required|string|unique:users,code',
            'name' => 'required|max:50|string|unique:users,name',

//            'email' => 'string|email|unique:users,email',
//            'password' => 'required|min:6|password|unique:users,password',
//            'role' => 'string:users,role',
//            'branch_id' => 'max:50|numeric:users,branch_id',
//            'photo' => 'string|image:users,photo',
//            'first_name' => 'max:50|string|unique:users,first_name',
//            'middle_name' => 'max:50|string|unique:users,middle_name',
//            'last_name' => 'required|max:50|string|unique:users,last_name',
//            'phone' => 'max:50|string|unique:users,phone',
//            'mobile' => 'max:50|string|unique:users,mobile',
//            'id_number' => 'max:50|string:users,id_number',
//            'account-box_id' => ' ',
//            'store_id' => ' ',
//            'is_active'=>''
        ];
    }



}
