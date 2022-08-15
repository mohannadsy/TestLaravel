<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentsController extends Controller
{

    public function index()
    {
        return view('uoload');
//
    }

    public function Upload(Request $request)
    {
        $data = new Attachment();
        $file = $request->file;

        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('public', $filename);
        $data->file = $filename;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();

    }

    public function show()
    {
        $data = Attachment::all();
        return view('show', compact('data'));
    }

    public function download(Request $request ,$file)
    {
        return response()->download(public_path('public/'.$file));
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
