<?php

namespace App\Http\Controllers\Attachment;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Http\Controllers\Controller;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Attachments\AttachmentsTrait;
use File;
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


        if (!$data->type == 'Images' || !$data->type == 'file') {
            return "You Can not Upload This File";
        }
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

    public function delete(Request $request)
    {   $file = $request->filename;
        if(File::exists(public_path($request->$file))){
            File::delete(public_path($request->$file));
        }else{
            dd('File does not exists.');
        }

        }
//
//       }
//    public function delete($id ,Request $request)
//    {
//if ($file = $request->file('file')) {
//$name = $file->getClientOriginalName();
//if ($file->move('images', $name)) {
//}

//        $img = Image::find($id);
//        if(File::exists(public_path($request->$img))){
//            File::delete(public_path($request->$img));
//        }else{
//            dd('File does not exists.');
//        }

//        $image_path = $request->image;  // the value is : localhost/project/image/filename.format
//        if(File::exists($image_path)) {
//            File::delete($image_path);
//        }

//        $request->file->store('public');
//        dd($request->file);
//        return 'Done';
//        $request->
//    }
    }
