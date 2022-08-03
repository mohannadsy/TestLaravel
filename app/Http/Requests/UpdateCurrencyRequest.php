<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $rules = [
//            'code' => 'required|string|unique:currencies,code',
//            'name' => 'required|max:50|string|unique:currencies,name',
//            'latin_name' => 'max:50|string|unique:currencies,latin_name',
//            'equality' => 'numeric:currencies,equality',
//            'match' => 'numeric:currencies,match',
//            'lain_part_name' => 'max:50|string:currencies,lain_part_name',
//            'part' => 'max:50|string:currencies,part',
//            'accuracy' => 'numeric:currencies,accuracy',
        ];
    }

//    public function messages()
//    {
//        return $messages = [
//
////            'code.required' => 'رمز  العملة يجب أن يُدخل',
////            'code.unique' => 'رمز  العملة موجود سابقاً ',
////            'code.string' => 'رمز  العملة يجب أن يكون محارف ',
////            'name.required' => 'اسم  العملة يجب أن يُدخل',
////            'name.max' => 'اسم  العملة تجاوز 50 محرف',
////            'name.unique' => 'اسم  العملة موجود سابقا',
////            'name.string' => 'اسم  العملة يجب أن يكون محارف',
////            'equality.numeric' => 'التعادل  يجب أن يكون ارقام',
////            'match.numeric' => 'المكافئ  يجب أن يكون ارقام',
////            'lain_part_name.max' => ' الاسم اللاتيني للجزء تجاوز 50 رقم',
////            'lain_part_name.string' => 'الاسم االلاتيني للجزء يجب أن يكون محارف',
////            'lain_name.max' => ' الاسم اللاتيني تجاوز 50 رقم',
////            'lain_name.string' => 'الاسم االلاتيني يجب أن يكون محارف',
////            'part.max' => ' الاسم اللاتيني تجاوز 50 رقم',
////            'part.string' => 'الاسم االلاتيني يجب أن يكون محارف',
////            'accuracy.numeric' => 'الدقة يجب أن يكون أرقام'
//        ];
//    }

}
