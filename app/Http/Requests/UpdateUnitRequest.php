<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code'                   =>'required|string:units,code',
            'name'                   =>'required|max:50|string:units,name' ,

        ];
    }

}
