<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCostCentersRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return $rules=
            [
//              'code'                    =>'required|string|unique:cost_centers,code',
//              'name'                    =>'required|max:50|string|unique:cost_centers,name' ,
//              'latin_name'              =>'max:150|string|unique:cost_centers,latin_name' ,
//              'center_id'               =>'max:50|numeric' ,
//              'balance'                 =>'numeric',
//              'in_balance'              =>'numeric',
//              'out_balance'             =>'numeric',
//              'notes'                   =>'string|max:500',
            ];
    }

//    public function messages()
//    {
//        return $messages= [
////            'code.required'           => 'رمز مركز الكلفة يجب أن يُدخل',
////            'code.string'             => 'رمز مركز الكلفة يجب أن يكون محارف ',
////            'code.unique'             => 'رمز مركز الكلفة موجود سابقاً ',
////            'name.required'           => 'اسم مركز الكلفة يجب أن يُدخل',
////            'name.max'                => 'اسم مركز الكلفة تجاوز 50 محرف ',
////            'name.string'             => 'اسم مركز الكلفة يجب أن يكون محارف ',
////            'name.unique'             => 'اسم مركز الكلفة موجود سابقاً ',
////            'latin_name.max'          => 'اسم اللاتيني لمركز الكلفة تجاوز 50 محرف ',
////            'latin_name.string'       => 'اسم اللاتيني لمركز الكلفة يجب أن يكون محارف ',
////            'latin_name.unique'       => 'اسم اللاتيني لمركز الكلفة موجود سابقاً ',
////            'center_id.max'           => 'رمز مركز الكلفة الرئيسي تجاوز 50 رقم ',
////            'center_id.numeric'       => 'رمز مركز الكلفة الرئيسي يجب أن يكون ارقام  ',
////            'balance.numeric'         => 'الرصيد يجب أن يكون ارقام  ',
////            'in_balance.numeric'      => 'الرصيد الدائن يجب أن يكون ارقام  ',
////            'out_balance.numeric'     => 'الرصيد المدين يجب أن يكون ارقام  ',
////            'notes.string'            => 'الملاحظات يجب أن تكون محارف ',
////            'notes.max'               => 'الملاحظات تجاوزت 50 محرف ',
//
//        ];
//    }
}
