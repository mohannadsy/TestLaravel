<?php

namespace App\Http\Controllers\Attachment;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Http\Controllers\Controller;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Attachments\AttachmentsTrait;
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


    public function Upload(AttachmentRequest $request)
    {


        $data = new Attachment();

        $path = $request->path;


        $filename = $path->getClientOriginalName();
        $extension = $path->getClientOriginalExtension();
        if ($extension == 'png' | $extension == 'gif' | $extension == 'csv' | $extension == 'xlsx' | $extension == 'pdf' | $extension == 'docs' | $extension == 'doc') {

            $limit = strlen($extension);
            $request->path->move('public', $filename);
            $data->path = $filename;
            $data->name = substr($filename, 0, -($limit + 1));

            $data->attachmentable_type = 'App\Models\User';
            $data->attachmentable_id = 1;
            $data->extension = $extension;
            $data->save();

            return redirect()->back();
        } else {
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

    public function delete()
    {

    }

//       if ( $file  = $request->file('file')){
//           $name = $file->getClientOriginalName();
//          if ( $file->move('images',$name)){
//          }
//
//       }
//    public function delete($id ,Request $request)
//    {
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
