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

    public function messages()
    {
        return $messages = [

            'code.required' => __('user.code required'),
            'code.unique' => __('user.code unique'),
            'code.string' => __('user.code string'),
            'name.required' => __('user.name required'),
            'name.max' => __('user.name max'),
            'name.unique' => __('user.name unique'),
            'name.string' => __('user.name string'),

//            'email.required' => 'البريد الالكتروني يجب أن يكون موجود',
//            'email.unique' => 'البريد الالكتروني مُدخل سابقاً لمستخدم آخر',
//            'email.string' => ' البريد الالكتروني  يجب أن يكون محارف',
//            'email.email' => '  ما تم إدخاله غير متوافق مع صيغة البريد الالكتروني',
//
//            'password.required' => 'كلمة المرور يجب أن تكون موجودة',
//            'password.unique' => 'كلمة المرور مُدخلة سابقاً لمستخدم آخر',
//            'password.min' => ' كلمة المرور يجب أن تكون 6 محارف على الأقل ',
//
//            'role.string' => 'صفة لامستخدم يجب أن تكون محارف',
//
//            'branch_id.max' => 'رمز الفرع الرئيسي تجاوز 50 رقم',
//            'branch_id.numeric' => 'رمز الفرع الرئيسي يجب أن يكون ارقام',
//
//            'phone.max' => 'رقم الهاتف تجاوز 50 رقم',
//            'phone.unique' => 'رقم الهاتف مُدخل سابقاً لمستخدم آخر',
//            'phone.string' => 'رقم الهاتف يجب أن يكون محارف',
//            'mobile.max' => 'رقم الموبايل تجاوز 50 محرف',
//            'mobile.unique' => 'رقم الموبايل مُدخل سابقاً لمستخدم آخر',
//            'mobile.string' => 'رقم الموبايل يجب أن يكون محارف',
//            'id_number.max' => 'الرقم الوطني تجاوز 50 محرف ',
//            'id_number.numeric' => 'الرقم الوطني يجب أن يكون أرقام',
//            'account-box_id' => ' ',
//            'store_id' => ' ',
//            'is_active',
        ];
    }


}
