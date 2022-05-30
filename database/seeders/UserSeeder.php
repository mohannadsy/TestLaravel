<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        $userMohannad = User::create([
            'name' => 'Super Admin',
            'email' => 'superAdmin@gmail.com',
            'password' => bcrypt('12345superadmin'),
            'branch_name' => 'Main Branch',
            'role' => 'Super Admin',// مدير عام
            'branch_id' => '1',
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',


        ]);

        $userNoor = User::create([
            'name' => 'Noor Al-kinj',
            'email' => 'noor@gmail.com',
            'password' => bcrypt('12345noor'),
            'branch_name' => 'Main Branch',
            'role' => 'Accountant',
            'branch_id' => '1',
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'phone' => '09955556374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',

        ]);

        $userClauda = User::create([
            'name' => 'Clauda Al-Rakkad',
            'email' => 'clauda@gmail.com',
            'password' => bcrypt('12345clauda'),
            'branch_name' => 'Main Branch',
            'role' => 'Casher',
            'branch_id' => '1',
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',

        ]);
    }
}
