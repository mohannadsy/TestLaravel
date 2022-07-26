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
            'category_id' => 1,
            'place' => 'place 1',
            'manufacture_company' => 'update', // الشركة المصنعة
            'origin_country' => 'syria',//بلط المنشأ
            'source' => 'source',//المصدر
            'caliber' => 'caliber',//العيار
            'chemical_composition' => 'fullMetal Alchemist <3',//تركيب كيميائي
            'weight' => 4.5,
            'size' => 55,
            'photo' => 'url',
            'notes' => 'notes',
            'branch_id' => 5,

            'last_purchase' => 4.5,
            'middle_purchase' => 4.5,
            'max_purchase' => 4.5,
            'min_price' => 4.5,
            'cost' => 4.5,

            'currency' => 'اليرة السورية',
            'equality' => 4.5,
            'automatic_discount_on_sale' => 4.5,
            'added_value_tax' => 4.5,
            'pricing_method' => 'by cost',


            'type' => 'origin',
            'product_date' => '6/3/2023',

            'force_on_output' => false,
            'force_on_input' => true,

            'aggregate_item' => false,
            'modified_item' => false,

            'is_service' => false,
            'is_stored' => false,
            'origin' => true,


        ]);


    }
}
