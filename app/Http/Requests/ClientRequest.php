<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $rules = [

            'name' => '',
            'notes' => '',
            'photo' => '',
            'gender' => '',
            'nationality' => '',
            'work' => '',
            'birth_place' => '',
            'birth_data' => '',
            'record_number' => '',
            'address' => '',
            'email_code' => '',
            'phone' => '',
            'mobile' => '',
            'fax' => '',
            'email' => '',
            'default_price' => '',
            'discount_rate' => '',
            'discount_account' => '',
            'account_id' => '',
        ];
    }


    public function messages()
    {
        return $messages = [

            'name' => '',
            'notes' => '',
            'photo' => '',
            'gender' => '',
            'nationality' => '',
            'work' => '',
            'birth_place' => '',
            'birth_data' => '',
            'record_number' => '',
            'address' => '',
            'email_code' => '',
            'phone' => '',
            'mobile' => '',
            'fax' => '',
            'email' => '',
            'default_price' => '',
            'discount_rate' => '',
            'discount_account' => '',
            'account_id' => '',
        ];
    }
}
