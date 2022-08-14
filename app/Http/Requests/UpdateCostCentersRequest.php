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
                'code'                   =>'required|string',
                'name'                   =>'required|max:50|string' ,
            ];
    }


}
