<?php

namespace App\Http\Controllers\Attachment;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Http\Controllers\Controller;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Attachments\AttachmentsTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\length;

class AttachmentsController extends Controller
{
    use ActivityLog, AttachmentsTrait;

    public function index()
    {
        return view('uoload');
//
    }


    public function Upload(Request $request)
    {


        $data = new Attachment();

        $path = $request->path;


        $filename = $path->getClientOriginalName();
        $extension = $path->getClientOriginalExtension();

        if ($extension == 'txt' | $extension == 'xlx' | $extension == 'csv' | $extension == 'xls' | $extension == 'pdf' | $extension == 'docx' | $extension == 'docs' | $extension == 'doc') {
            $data->type = 'file';
        } elseif ($extension == 'png' | $extension == 'jpeg' | $extension == 'jpg') {
            $data->type = 'Image';
        }
        $limit = strlen($extension);
        $request->path->move('public', $filename);
        $data->path = $filename;
        $data->name = substr($filename, 0, -($limit + 1));

        $data->attachmentable_type = 'App\Models\User';
        $data->attachmentable_id = 1;
        $data->extension = $extension;
        $data->save();

        print($filename);
        if (!$data->type == 'Images' || !$data->type == 'file') {
            return "You Can not Upload This File";
        }
//        redirect('show');
    }


    public function show()
    {
        $data = Attachment::all();
        return view('show', compact('data'));
    }

    public function download(Request $request, $path)
    {
        return response()->download(public_path('public/' . $path));

    }

    public function delete($id)
    {
        $file = Attachment::find($id);
        $file_name = $file->filname;
        $public_path = public_path('public/' . $file->path);
        unlink($public_path);
        $file->delete();
    }
}
