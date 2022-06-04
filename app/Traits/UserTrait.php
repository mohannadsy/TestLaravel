<?php


namespace App\Traits;

trait  UserTrait
{
//    function saveImage($photo, $folder)
//    {
//
//        $file_extension = $photo->getClientOriginalExtension();
//        $file_name = time() . '.' . $file_extension;
//        $path = $folder;
//        $photo->move($path, $file_name);
//
//        return $file_name;
//    }


    public $public_path = "/public/Images/users";
    public $storage_path = "/storage/Images/users";

    public function saveImage($file, $path, $width, $height): string
    {
        if ($file) {

            $extension = $file->getClientOriginalExtension();
            $file_name = $path . '-' . Str::random(30) . '.' . $extension;
            $url = $file->storeAs($this->public_path, $file_name);
            $public_path = public_path($this->storage_path . $file_name);
            $img = Image::make($public_path)->resize($width, $height);
            $url = preg_replace("/public/", "", $url);
            return $img->save($public_path) ? $url : '';
        }

    }
}
