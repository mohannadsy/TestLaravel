<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class

AttachmentSeeder extends Seeder
{

    public function run()
    {
        $normalAttachment = Attachment::create([

            'name' => 'attachment 1 ',
            'path' => 'path 1',
            'type' => 'image',
            'extension' => 'extension',
            'attachmentable_type' => 'App\Models\Store',
            'attachmentable_id' => 1

//            'table' => '1',
//            'table_id' => '1'

        ]);
        $normalAttachment = Attachment::create([
            'name' => 'attachment 2',
            'path' => 'path 2',
            'type' => 'file',
            'extension' => 'extension',
//            'table' => '1',
//            'table_id' => '1'
            'attachmentable_type' => 'App\Models\Store',
            'attachmentable_id' => 1

        ]);

    }
}
