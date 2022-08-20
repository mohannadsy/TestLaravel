<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'code'                   =>'required|string:stores,code',
            'name'                   =>'required|max:50|string:stores,name' ,

        ];
    }

}
