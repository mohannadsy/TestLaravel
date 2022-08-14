<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|string|unique:accounts,code',
            'name' => 'required|max:50|string|unique:accounts,name',
//            'name' => 'required',
//            'code' => 'required',
//            'latin_name' => '',
//            'type' => '',
//            'account_id' => '',
//            'final_account_id' => 'required',
//            'is_final',
//            'cost_center_id' => '',
//            'currency_id' => '',
//            'equality' => '',
//            'budget' => '',
//            'nature' => '',
//            'current_balance' => '',
//            'results' => '',
//            'notes' => '',
        ];
    }


}
