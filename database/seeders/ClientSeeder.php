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
            'name' => 'client',
            'notes' => 'this is first client ',
            'photo' => '372856',
            'gender' => 'female',
            'nationality' => 'syrian',
            'work' => 'student',
            'birth_place' => 'qq',
            'birth_data' => ' 7/6/2022',
            'record_number' => 32,
            'address' => '',
            'email_prefix' => 32,
            'phone' => '',
            'mobile' => '',
            'fax' => '',
            'email' => 'something@gmail.com',
            'default_price' => 32,
            'discount_rate' => '',
            'discount_account' => 323,
            'payment_method' => '',
            'account_id' => 1,
            'branch_id'=>1,
            'security_degree' => 1 // سرية
        ]);
    }
}
