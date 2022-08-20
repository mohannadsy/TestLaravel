<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Http\Requests\ImagesRequest;
use Illuminate\Http\File;
use Illuminate\Http\Request;


class ImagesController extends Controller
{

    public function store(ImagesRequest $request)
    {

        $data = new Image();

        $path = $request->path;

        $filename = $path->getClientOriginalName();
        $extension = $path->getClientOriginalExtension();
        if ($extension ){

            $limit =  strlen($extension);
            $request->path->move('public', $filename);
            $data->path = $filename;
            $data->name =substr($filename,0,-($limit+1));
            $data->type =$extension;
            $data->save();

            return redirect()->back();
        } else {
            return "You Can not Upload This File";
        }
    }






    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function show(Image $images)
    {
        //
    }

    public function edit(Image $images)
    {
        //
    }


    public function update(ImagesRequest $request, Image $images)
    {
        //
    }


    public function delete($id ,Request $request)
    {
        $img = Image::find($id);
        if(File::exists(public_path($request->$img))){
            File::delete(public_path($request->$img));
        }else{
            dd('File does not exists.');
        }

//        $image_path = $request->image;  // the value is : localhost/project/image/filename.format
//        if(File::exists($image_path)) {
//            File::delete($image_path);
//        }
    }
}
