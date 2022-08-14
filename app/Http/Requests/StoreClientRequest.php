<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $rules = [
            'code'                   =>'required|string|unique:clients,code',
            'name'                   =>'required|max:50|string|unique:clients,name' ,
//            'name' => '',
//            'notes' => '',
//            'photo' => '',
//            'gender' => '',
//            'nationality' => '',
//            'work' => '',
//            'birth_place' => '',
//            'birth_data' => '',
//            'record_number' => '',
//            'address' => '',
//            'email_prefix' => '',
//            'phone' => '',
//            'mobile' => '',
//            'fax' => '',
//            'email' => '',
//            'default_price' => '',
//            'discount_rate' => '',
//            'discount_account' => '',
//            'payment_conditions' => '',
//            'account_id' => '',
        ];
    }


}
