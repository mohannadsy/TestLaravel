<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCostCentersRequest extends FormRequest
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


}
