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
//            'branch_id'=>1,
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
                'unit_id' => 5,


                'type' => 'origin',
                'product_date' => '6/3/2023',

                'expiration_date_force_on_input' => false,
                'expiration_date_force_on_output' => true,

                'aggregate_item' => false,
                'modified_item' => false,
                'serial_number_force_on_input' => false,
                'serial_number_force_on_output' => false,
                'is_service' => false,
                'is_stored' => false,
                'is_origin' => true,

                'store_id' => 1,
                'amount' => 12,
                'amount_sum' => 32,

                'is_additive' => true,
                'additive_IDs' => [
                    '1' => ['2'],
                    '2' => ['3'],
                    '3' => ['7'],
                ]
            ]

        );


    }
}
