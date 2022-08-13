<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'code'                   =>'required|string|unique:stores,code',
            'name'                   =>'required|max:50|string|unique:stores,name' ,
        ];
    }
}
