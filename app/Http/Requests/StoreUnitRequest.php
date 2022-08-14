<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code'                   =>'required|string|unique:units,code',
            'name'                   =>'required|max:50|string|unique:units,name' ,

        ];
    }
}
