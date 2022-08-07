<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{

    public function run()
    {
        $unit1 = Unit::create([
            'name' => 'unit1',
            'barcode' => '1',
            'convert_parameter' => ' ',
            'unit_id' => 1,

            'not_fixed' => false,


            'default_unit' => 'unit1',
            'item_limit' => 'item_limit',


            'automatic_price_calculation' => false,
            'value' => 43.4,
            'gain' => 43,
            'percentage_gain' => '23',


            'last_purchase' => 4.5,
            'middle_purchase' => 4.5,
            'max_purchase' => 4.5,
            'min_price' => 4.5,
            'cost' => 4.5,

            'currency_id' => 1,

            'equality' => 4.5,
            'automatic_discount_on_sale' => 4.5,
            'added_value_tax' => 4.5,
            'pricing_method' => 'by cost',
            'is_default' => false,
        ]);
        $unit2 = Unit::create([
            'name' => 'unit2',
            'barcode' => '1',
            'convert_parameter' => '  ',
            'unit_id' => 1,

            'not_fixed' => false,

            'automatic_price_calculation' => false,

            'value' => 43.4,
            'gain' => 43,
            'percentage_gain' => '23',


            'default_unit' => 'unit1',
            'item_limit' => 'item_limit',

            'last_purchase' => 4.5,
            'middle_purchase' => 4.5,
            'max_purchase' => 4.5,
            'min_price' => 4.5,
            'cost' => 4.5,

            'currency_id' => 1,
            'equality' => 4.5,
            'automatic_discount_on_sale' => 4.5,
            'added_value_tax' => 4.5,
            'pricing_method' => 'by cost',
            'is_default' => false,

        ]);
        $unit3 = Unit::create([
            'name' => 'unit3',
            'barcode' => '1',
            'convert_parameter' => '  ',
            'unit_id' => 1,

            'not_fixed' => false,

            'automatic_price_calculation' => false,

            'value' => 43.4,
            'gain' => 43,
            'percentage_gain' => '23',


            'default_unit' => 'unit1',
            'item_limit' => 'item_limit',

            'last_purchase' => 4.5,
            'middle_purchase' => 4.5,
            'max_purchase' => 4.5,
            'min_price' => 4.5,
            'cost' => 4.5,

            'currency_id' => 1,
            'equality' => 4.5,
            'automatic_discount_on_sale' => 4.5,
            'added_value_tax' => 4.5,
            'pricing_method' => 'by cost',
            'is_default' => false,

        ]);
        $unit4 = Unit::create([
            'name' => 'unit4',
            'barcode' => '1',
            'convert_parameter' => '  ',
            'unit_id' => 1,

            'not_fixed' => false,

            'automatic_price_calculation' => false,

            'value' => 43.4,
            'gain' => 43,
            'percentage_gain' => '23',


            'default_unit' => 'unit1',
            'item_limit' => 'item_limit',


            'last_purchase' => 4.5,
            'middle_purchase' => 4.5,
            'max_purchase' => 4.5,
            'min_price' => 4.5,
            'cost' => 4.5,

            'currency_id' => 1,
            'equality' => 4.5,
            'automatic_discount_on_sale' => 4.5,
            'added_value_tax' => 4.5,
            'pricing_method' => 'by cost',
            'is_default' => false,

        ]);
        $unit5 = Unit::create([
            'name' => 'unit5',
            'barcode' => '1',
            'convert_parameter' => '  ',
            'unit_id' => 1,

            'not_fixed' => false,


            'value' => 43.4,
            'gain' => 43,
            'percentage_gain' => '23',

            'default_unit' => 'unit1',
            'item_limit' => 'item_limit',


            'last_purchase' => 4.5,
            'middle_purchase' => 4.5,
            'max_purchase' => 4.5,
            'min_price' => 4.5,
            'cost' => 4.5,

            'currency_id' => 1,
            'equality' => 4.5,
            'automatic_discount_on_sale' => 4.5,
            'added_value_tax' => 4.5,
            'pricing_method' => 'by cost',
            'is_default' => false,

        ]);


    }
}
