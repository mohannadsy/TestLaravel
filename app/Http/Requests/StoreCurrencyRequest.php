<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $rules = [
            'code'                   =>'required|string|unique:branches,code',
            'name'                   =>'required|max:50|string|unique:branches,name' ,
//            'code' => 'required|string|unique:currencies,code',
//            'name' => 'required|max:50|string|unique:currencies,name',
//            'latin_name' => 'max:50|string|unique:currencies,latin_name',
//            'equality' => 'numeric:currencies,equality',
//            'match' => 'numeric:currencies,match',
//            'lain_part_name' => 'max:50|string:currencies,lain_part_name',
//            'part' => 'max:50|string:currencies,part',
//            'accuracy' => 'numeric:currencies,accuracy',
        ];
    }


}
