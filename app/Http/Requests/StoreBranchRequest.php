<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
        return $rules=[
             'code'                   =>'required|string|unique:branches,code',
             'name'                   =>'required|max:50|string|unique:branches,name' ,
             'branch_id'              =>'max:50|numeric' ,
             'responsibility'         =>'max:250|string',
             'address'                =>'max:100|string',
             'website'                =>'string|unique:branches,website',
             'email'                  =>'string|email|unique:branches,email',
             'phone'                  =>'max:50|string|unique:branches,phone',
             'mobile'                 =>'max:50|string|unique:branches,mobile',
        ];
    }

    public function messages()
    {
        return $messages= [
            'code.required'          => 'رمز الفرع يجب أن يُدخل',
            'code.unique'            => 'رمز الفرع موجود سابقاً ',
            'code.string'            => 'رمز الفرع يجب أن يكون محارف ',
            'name.required'          => 'اسم الفرع يجب أن يُدخل',
            'name.max'               => 'اسم الفرع تجاوز 50 محرف ',
            'name.unique'            => 'اسم الفرع موجود سابقاً ',
            'name.string'            => 'اسم الفرع يجب أن يكون محارف ',
            'branch_id.max'          => 'رمز الفرع الرئيسي تجاوز 50 رقم ',
            'branch_id.numeric'      => 'رمز الفرع الرئيسي يجب أن يكون ارقام  ',
            'responsibility.max'     => 'معلومات الفرع(الصفة) تجاوز 250 محرف ',
            'responsibility.string'  => 'معلومات الفرع يجب أن يكون محارف ',
            'address.max'            =>  'عنوان الفرع تجاوز 100 محرف ',
            'address.string'         =>'عنوان الفرع يجب أن يكون محارف ',
            'website.unique'         =>'الموقع الالكتروني مُدخل سابقاً لفرع آخر ',
            'website.string'         =>'الموقع الالكتروني يجب أن يكون محارف  ',
            'email.unique'           =>'البريد الالكتروني مُدخل سابقاً لفرع آخر  ',
            'email.string'           =>' البريد الالكتروني  يجب أن يكون محارف ',
            'phone.max'              => 'رقم الهاتف تجاوز 50 رقم ',
            'phone.unique'           => 'رقم الهاتف مُدخل سابقاً لفرع آخر ',
            'phone.string'           =>'رقم الهاتف يجب أن يكون محارف ',
            'mobile.max'             => 'رقم الموبايل تجاوز 50 محرف ',
            'mobile.unique'          => 'رقم الموبايل مُدخل سابقاً لفرع آخر ',
            'mobile.string'          =>'رقم الموبايل يجب أن يكون محارف ',
        ];
    }
}
