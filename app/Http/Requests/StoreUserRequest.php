<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return $rules = [
//            'name' => 'required | max:100 | string:user,name',
            'email' => 'required | email | unique:users,email',
            'password' => 'required |\'min:6\'| unique:users,password',
            'password_confirm' => 'required|same:password',
            '' => 'required | max:100 | unique:products,name_en',
            '' => 'required | numeric ',
            '' => 'required | ',

        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'الاسم يجب أن يكون موجود ',
            'name.unique' => 'الاسم يجب ألا يتكرر',
            'email.required' => 'البريد الالكتروني يجب أن يكون موجود',
            'email.unique' => 'البريد الالكتروني يجب ألا يتكر',
            '' => '',
            '' => '',

        ];
    }


}
