<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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


//    public function messages()
//    {
//        return $message = [
////            'name' => '',
////            'code' => '',
////            'latin_name' => '',
////            'type' => '',
////            'account_id' => '',
////            'final_account_id' => '',
////            'is_final' => '',
////            'cost_center_id' => '',
////            'currency_id' => '',
////            'equality' => '',
////            'budget' => '',
////            'nature' => '',
////            'current_balance' => '',
////            'results' => '',
////            'notes' => '',
//        ];
//    }
}
