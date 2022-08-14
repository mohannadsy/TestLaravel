<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'code'                   =>'required|string|unique:branches,code',
            'name'                   =>'required|max:50|string|unique:branches,name' ,

        ];
    }


}
