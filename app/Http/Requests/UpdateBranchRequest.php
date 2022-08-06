<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $rules = [

            'code' => 'unique,required:branches,code',
            'name' => 'unique:branches,name',

//              'code'                   =>'required|string|unique:branches,code',
//              'name'                   =>'required|max:50|string|unique:branches,name' ,
//              'branch_id'              =>'max:50|numeric' ,
//              'responsibility'         =>'max:250|string',
//              'address'                =>'max:100|string',
//              'website'                =>'string|unique:branches,website',
//              'email'                  =>'string|email|unique:branches,email',
//              'phone'                  =>'max:50|string|unique:branches,phone',
//              'mobile'                 =>'max:50|string|unique:branches,mobile',
        ];
    }

}
