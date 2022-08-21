<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'path' => 'mimes:txt,xlx,csv,xls,pdf,doc,docs|max:2048,attachments,path'


        ];
    }


}
