<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'',
            'code'=>'',
            'latin_name'=>'',
            'type'=>'',
            'account_id'=>'',
            'final_account'=>'',
            'cost_center_id'=>'',
            'currency_id'=>'',
            'equality'=>'',
            'budget'=>'',
            'nature'=>'',
            'current_balance'=>'',
            'results'=>'',
            'notes'=>'',

        ];
    }


    public function messages()
    {
        return $message =[
            'name'=>'',
            'code'=>'',
            'latin_name'=>'',
            'type'=>'',
            'account_id'=>'',
            'final_account'=>'',
            'cost_center_id'=>'',
            'currency_id'=>'',
            'equality'=>'',
            'budget'=>'',
            'nature'=>'',
            'current_balance'=>'',
            'results'=>'',
            'notes'=>'',
            ];
    }
}
