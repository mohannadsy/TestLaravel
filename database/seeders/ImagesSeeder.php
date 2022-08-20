<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{

    public function run()
    {

        $normalImages = Image::create([

            'name' => 'image 1 ',
            'path' => 'path 1',
            'image_id'=> 1,
            'table'=> '1',
            'table_id'=> '1'

        ]);
        $normalImages = Image::create([
            'name' => 'image 2',
            'path' => 'path 2',
            'image_id'=>2,
            'table'=> '1',
            'table_id'=> '1'

        ]);

    }
}
