<?php

namespace App\Http\Controllers\Attachment;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Http\Controllers\Controller;
use App\Traits\ActivityLog\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\length;

class AttachmentsController extends Controller
{
    use ActivityLog;

    public function index()
    {
        return view('uoload');
//
    }

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'attachments',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function Upload(AttachmentRequest $request)
    {

//        $data = new Attachment();
////
//        $path = $request->path;
//
//        if ($data->type = 'file') {
//
//            $filename = $path->getClientOriginalName();
//            $extension = $path->getClientOriginalExtension();
//            if ($extension == 'png' | $extension == 'gif' | $extension == 'csv' | $extension == 'xlsx' | $extension == 'pdf' | $extension == 'docs' | $extension == 'doc') {
//
//                $limit = strlen($extension);
//                $request->path->move('public', $filename);
//                $data->path = $filename;
//                $data->name = substr($filename, 0, -($limit + 1));
////                $data->attachmentable_type = 'App\Models\User';
////                $data->attachmentable_id =1;
//                $data->extension = $extension;
//                $data->save();
//
//                return redirect()->back();
//            } else {
//                return "You Can not Upload This File";
//            }
//        }
//        $normalAttachment = Attachment::create([
//            'name' => 'attachment 2',
//            'path' => 'path 2',
//            'type' => 'file',
//            'extension' => 'extension',
////            'table' => '1',
////            'table_id' => '1'
//            'attachmentable_type' => 'App\Models\Store',
//            'attachmentable_id' => 1
//
//        ]);

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


//        $request->file->store('public');
//        dd($request->file);
//        return 'Done';
//        $request->
//    }
}
