<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return $rules = [
            'code' => 'required|unique|string:users,code',
            'name' => 'required|max:50|unique|string:users,name',
            'email' => 'unique|string|email::users,email',
            'password' => 'required|min:6|unique|password:users,password',
//          'password_confirm' => 'required|same:password:users,password_confirm',
            'branch_name' => 'string:users,branch_name',
            'role' => 'string:users,role',
            'branch_id' => 'max:50|numeric:users,branch_id',
            'photo' => 'string|image:users,photo',
            'first_name' => 'required|max:50|unique|string:users,first_name',
            'middle_name' => 'required|max:50|unique|string:users,middle_name',
            'last_name' => 'required|max:50|unique|string:users,last_name',
            'phone' => 'max:50|unique|string:users,phone',
            'mobile' => 'max:50|unique|string:users,mobile',
            'id_number' => 'max:50|numeric:users,id_number',
        ];

    }


    public function messages()
    {
        return $messages = [

            'code.required' => 'رمز المستخدم يجب أن يُدخل',
            'code.unique' => 'رمز المستخدم موجود سابقاً ',
            'code.string' => 'رمز المستخدم يجب أن يكون محارف ',

            'name.required' => 'اسم المستخدم يجب أن يُدخل',
            'name.max' => 'اسم المستخدم تجاوز 50 محرف',
            'name.unique' => 'اسم المستخدم موجود سابقا',
            'name.string' => 'اسم المستخدم يجب أن يكون محارف',

            'email.required' => 'البريد الالكتروني يجب أن يكون موجود',
            'email.unique' => 'البريد الالكتروني مُدخل سابقاً لمستخدم آخر',
            'email.string' => ' البريد الالكتروني  يجب أن يكون محارف',

            'password.required' => 'كلمة المرور يجب أن تكون موجودة',
            'password.unique' => 'كلمة المرور مُدخلة سابقاً لمستخدم آخر',
            'password.min' => ' كلمة المرور يجب أن تكون 6 محارف على الأقل ',

            'branch_name.string' => 'اسم الفرع يجب أن يكون محارف',
            'role.string' => 'صفة لامستخدم يجب أن تكون محارف',

            'branch_id.max' => 'رمز الفرع الرئيسي تجاوز 50 رقم',
            'branch_id.numeric' => 'رمز الفرع الرئيسي يجب أن يكون ارقام',

            'phone.max' => 'رقم الهاتف تجاوز 50 رقم',
            'phone.unique' => 'رقم الهاتف مُدخل سابقاً لمستخدم آخر',
            'phone.string' => 'رقم الهاتف يجب أن يكون محارف',
            'mobile.max' => 'رقم الموبايل تجاوز 50 محرف',
            'mobile.unique' => 'رقم الموبايل مُدخل سابقاً لمستخدم آخر',
            'mobile.string' => 'رقم الموبايل يجب أن يكون محارف',
            'id_number.max' => 'الرقم الوطني تجاوز 50 محرف ',
            'id_number.numeric' => 'الرقم الوطني يجب أن يكون أرقام'


        ];
    }

}
