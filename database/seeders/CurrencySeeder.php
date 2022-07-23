<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{

    public function run()
    {
        $defaultCurrency = Currency::create([
            'name'              => 'الليرة السورية',
            'code'              => 1,
            'latin_name'        => 'Syrian Bound',
            'equality'          => 1,
            'match'             => 1,
            'part'              => 'قرش',
            'accuracy'          => 100,
            'lain_part_name'    => 'Piaster',
            'photo'             =>'',
            'security_degree' => 1 // سرية

        ]);
        $firstExtraCurrency = Currency::create([
            'name'              => 'الدولار الأمريكي',
            'code'              => 2,
            'latin_name'        => 'Dollar',
            'equality'          => 4000,
            'match'             => 1/4000,
            'part'              => 'سنت',
            'accuracy'          => 100,
            'lain_part_name'    => 'sent',
            'photo'             =>'',
            'security_degree' => 3 // سرية
        ]);


    }
}
