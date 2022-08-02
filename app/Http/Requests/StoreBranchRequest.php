<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code'                   =>'required|string|unique:branches,code',
            'name'                   =>'required|max:50' ,
//          'branch_id'              =>'max:50|numeric' ,
//          'responsibility'         =>'max:250|string',
//          'address'                =>'max:100|string',
//          'website'                =>'string|unique:branches,website',
//          'email'                  =>'string|email|unique:branches,email',
//          'phone'                  =>'max:50|string|unique:branches,phone',
//          'mobile'                 =>'max:50|string|unique:branches,mobile',

        ];
    }


}
