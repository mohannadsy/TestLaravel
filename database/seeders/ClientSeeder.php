<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{

    public function run()
    {
        $client1 = Client::create([
            'name' => 'client 1',
            'notes' => 'this is first client ',
            'photo' => '372856',
            'gender' => 'female',
            'nationality' => 'syrian',
            'work' => 'student',
            'birth_place' => 'qq',
            'birth_data' => 'ss',
            'record_number' => 32,
            'address' => '',
            'email_code' => '',
            'phone' => '',
            'mobile' => '',
            'fax' => '',
            'email' => '',
            'default_price' => '',
            'discount_rate' => '',
            'discount_account' => '',
            'account_id' => '',

        ]);
    }
}
