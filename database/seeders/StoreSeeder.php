<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    public function run()
    {
        Store::create([
            'code' => '1',
            'name' => 'المستودع الرئيسي',
            'latin_name' => 'Main store',
            'type' => 'AS ',
            'store_id' => null,
            'account_id' => 1,
            'address' => 'lattakia',
            'store_keeper' => 'ahmad',
            'storage_amount' => '500',
            'website' => '',
            'photo' => '',
            'notes' => '',
            'is_active' => true,
            'security_degree' => 1,
            'branch_id' => 1,
            'attachment_id'=> 2,
//            'attachment_id'=> 2,
        ]);
        Store::create([
            'code' => '2',
            'name' => 'المستودع الثاني',
            'latin_name' => 'second store',
            'type' => 'As ',
            'store_id' => 1,
            'account_id' => 1,
            'address' => 'jableh',
            'store_keeper' => 'ahmad',
            'storage_amount' => '200',
            'website' => '',
            'photo' => '',
            'notes' => '',
            'is_active' => true,
            'security_degree' => 3,
            'branch_id' => 2,
            'attachment_id'=> 1
        ]);
        Store::create([
            'code' => '3',
            'name' => 'المستودع الثالث',
            'latin_name' => 'third store',
            'type' => 'BS ',
            'store_id' => 2,
            'account_id' => 2,
            'address' => 'damascus',
            'store_keeper' => 'sara',
            'storage_amount' => '2500',
            'website' => '',
            'photo' => '',
            'notes' => '',
            'is_active' => false,
            'security_degree' => 1,
            'branch_id' => 3,
            'attachment_id'=>1
        ]);
        Store::create([
            'code' => '4',
            'name' => 'المستودع الرابع',
            'latin_name' => 'fourth store',
            'type' => ' XX',
            'store_id' => 1,
            'account_id' => 1,
            'address' => 'lattakia',
            'store_keeper' => 'ahmad',
            'storage_amount' => '500',
            'website' => '',
            'photo' => '',
            'notes' => '',
            'is_active' => false,
            'security_degree' => 1,
            'branch_id' => 4,
            'attachment_id'=>
              2



        ]);
    }

}
