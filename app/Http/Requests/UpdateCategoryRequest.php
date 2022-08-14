<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'code'                   =>'required|string:categories,code',
            'name'                   =>'required|max:50|string:categories,name' ,

        ];
    }


}
