<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{

    public function run()
    {
        $item = Item::create([
            'code' => 1,
            'name' => 'المادة الأولى',
            'latin_name' => 'first item',
            'is_active' => true,
            'is_inherited' => false,
            'security_degree' => 1,
            'class' => 'class 1',
            'place' => 'place 1',
            'manufacture_company' => 'update', // الشركة المصنعة
            'origin_country' => 'syria',//بلط المنشأ
            'source' => 'source',//المصدر
            'caliber' => 'caliber',//العيار
            'chemical_composition' => 'fullMetal Alchemist <3',//تركيب كيميائي
            'weight' => 4.5,
            'size' => 55,
            'photo' => 'url',
            'notes' => 'notes'
        ]);


    }
}
