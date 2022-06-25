<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaulCurrency = Currency::create([
            'name' => 'الليرة السورية',
            'code' => 1,
            'latin_name' => 'Syrian Bound',
            'equality' => 1,
            'match' => 1,
            'part'=>'قرش',
            'accuracy' => 100,
            'lain_part_name' => 'Piaster',
        ]);


    }
}
