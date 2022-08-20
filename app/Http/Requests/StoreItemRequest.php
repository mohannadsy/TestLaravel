<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'code'                   =>'required|string|unique:items,code',
            'name'                   =>'required|max:50|string|unique:items,name' ,
        ];
    }
}
