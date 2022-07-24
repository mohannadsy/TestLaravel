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
            'code'                      => '1',
            'name'                      => 'Main store',
            'latin_name'                => null,
            'type'                      => 'AS ',
            'store_id'                  => null,
            'account_id'                => 1,
            'address'                   => 'lattakia',
            'store_keeper'              => 'ahmad',
            'storage_amount'            => '500',
            'website'                   => '',
            'photo'                     => '',
            'notes'                     => '',
            'is_active'                 => true,
            'security_degree'    => 1 // سرية
        ]);
        Store::create([
            'code'                      => '2',
            'name'                      => 'first store',
            'latin_name'                => null,
            'type'                      => 'As ',
            'store_id'                  => 1,
            'account_id'                => 1,
            'address'                   => 'jableh',
            'store_keeper'              => 'ahmad',
            'storage_amount'            => '200',
            'website'                   => '',
            'photo'                     => '',
            'notes'                     => '',
            'is_active'                 => true,
            'security_degree'    => 3 //
        ]);
        Store::create([
            'code'                      => '3',
            'name'                      => 'second store',
            'latin_name'                => null,
            'type'                      => 'BS ',
            'store_id'                  => null,
            'account_id'                => 2,
            'address'                   => 'damascus',
            'store_keeper'              => 'sara',
            'storage_amount'            => '2500',
            'website'                   => '',
            'photo'                     => '',
            'notes'                     => '',
            'is_active'                 => false,
            'security_degree'    => 1 // سرية
        ]);
        Store::create([
            'code'                      => '4',
            'name'                      => 'third store',
            'latin_name'                => null,
            'type'                      => ' XX',
            'store_id'                  => 1,
            'account_id'                => 1,
            'address'                   => 'lattakia',
            'store_keeper'              => 'ahmad',
            'storage_amount'            => '500',
            'website'                   => '',
            'photo'                     => '',
            'notes'                     => '',
            'is_active'                 => false,
            'security_degree'    => 1 // سرية
        ]);
    }

}
