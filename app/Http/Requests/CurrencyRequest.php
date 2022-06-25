<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return $rules = [
            'code' => 'required|string|unique:currencies,code',
            'name' => 'required|max:50|string|unique:currencies,name',
            'role' => 'string:currencies,role',
            'branch_id' => 'max:50|numeric:currencies,branch_id',
            'photo' => 'string|image:currencies,photo',
            'first_name' => 'max:50|string|unique:currencies,first_name',
            'middle_name' => 'max:50|string|unique:currencies,middle_name',
            'last_name' => 'required|max:50|string|unique:currencies,last_name',
            'phone' => 'max:50|string|unique:currencies,phone',
            'mobile' => 'max:50|string|unique:currencies,mobile',
            'id_number' => 'max:50|numeric:currencies,id_number',
        ];
    }

    public function messages()
    {
        return $messages = [

            'code.required' => 'رمز  العملة يجب أن يُدخل',
            'code.unique' => 'رمز  العملة موجود سابقاً ',
            'code.string' => 'رمز  العملة يجب أن يكون محارف ',

            'name.required' => 'اسم  العملة يجب أن يُدخل',
            'name.max' => 'اسم  العملة تجاوز 50 محرف',
            'name.unique' => 'اسم  العملة موجود سابقا',
            'name.string' => 'اسم  العملة يجب أن يكون محارف',

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
