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
            'code'=>'5',
            'name' => 'Super Admin',
            'email' => 'superAdmin@gmail.com',
            'password' => bcrypt('12345superadmin'),
            'branch_name' => 'Main Branch',
            'role' => 'Super Admin',// مدير عام
            'branch_id' => '1',
            'photo'=>'qqq',
            'first_name' => 's',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',


        ]);

        $userNoor = User::create([
            'code'=>'6',
            'name' => 'Noor Al-kinj',
            'email' => 'noor@gmail.com',
            'password' => bcrypt('12345noor'),
            'branch_name' => 'Main Branch',
            'role' => 'Accountant',
            'photo'=>'qqq',
            'branch_id' => '1',
            'first_name' => 'a',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09955556374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',

        ]);

        $userClauda = User::create([
            'code'=>'7',
            'name' => 'Clauda Al-Rakkad',
            'email' => 'clauda@gmail.com',
            'password' => bcrypt('12345clauda'),
            'branch_name' => 'Main Branch',
            'role' => 'Casher',
            'photo'=>'qqq',
            'branch_id' => '1',
            'first_name' => 's',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',

        ]);
    }
}
