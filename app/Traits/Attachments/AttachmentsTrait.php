<?php

namespace App\Traits\Attachments;


use App\Http\Requests\AttachmentRequest;

use App\Models\Attachment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AttachmentsTrait
{


    public function makeAttachment($parameters)
    {
        $request = $parameters['parameters']['request'];

        $data = new Attachment();

        $path = $request->path;

        $filename = $path->getClientOriginalName();
        $extension = $path->getClientOriginalExtension();


        if ($extension == 'txt' | $extension == 'xlx' | $extension == 'csv' | $extension == 'xls' | $extension == 'pdf' | $extension == 'docs' | $extension == 'doc') {
            $data->type = 'file';
        }
        if ($extension == 'png' | $extension == 'jpeg' | $extension == 'jpg') {
            $data->type = 'Image';
        }
        if ($extension) {
            $limit = strlen($extension);
            $request->path->move('public', $filename);
            $data->path = $filename;
            $data->name = substr($filename, 0, -($limit + 1));
            $data->attachmentable_type = $parameters['table'];
            $data->attachmentable_id = $parameters['parameters']['id'];
            $data->extension = $extension;
            $data->save();
            return redirect()->back();
        } else {
            return "This [ Type - Extension ] is not Allowed";
        }
    }
}
