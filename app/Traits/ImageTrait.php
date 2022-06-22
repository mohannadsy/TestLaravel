<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Image;

trait  ImageTrait
{

    public $public_path = "/public/Images/users";
    public $storage_path = "/storage/Images/users";

    public function getImageURL(Request $request)
    {
        if ($file = $request->file('profile_photo_path')) {
            $path = 'photos/users';
            $url = $this->saveImage($file, $path, 300, 400);
        }
    }

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
