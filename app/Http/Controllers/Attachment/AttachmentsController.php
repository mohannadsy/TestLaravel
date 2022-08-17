<?php

namespace App\Http\Controllers\Attachment;


use App\Http\Controllers\Controller;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
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


        $data = new Attachment();

        $path = $request->path;

        $filename = $path->getClientOriginalName();
        $extension = $path->getClientOriginalExtension();
        if ($extension){
//            == 'png' | $extension == 'gif' | $extension == 'csv' | $extension == 'xlsx' | $extension == 'pdf' | $extension == 'docs' | $extension == 'doc') {
            $limit = strlen($extension);
            $request->path->move('public', $filename);
            $data->path = $filename;
            $data->name = substr($filename, 0, -($limit + 1));
            $data->type = $extension;
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
