<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // user 1
        $userMohannad = User::create([
            'code' => '1',
            'name' => 'Super Admin',
            'email' => 'superAdmin@gmail.com',
            'password' => bcrypt('12345superadmin'),
            'branch_name' => 'Main Branch',
            'role' => 'Super Admin',// مدير عام
            'branch_id' => '1',
            'profile_photo_path' => 'qqq',
            'first_name' => 's',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',
        ]);
        $userMohannad->assignRole('Admin');
        $userMohannad->assignRole('Accountant');
        $userMohannad->givePermissionTo('store-user');

        // user 2
        $userNoor = User::create([
            'code' => '2',
            'name' => 'Noor Al-kinj',
            'email' => 'noor@gmail.com',
            'password' => bcrypt('12345noor'),
            'branch_name' => 'Main Branch',
            'role' => 'Accountant',
            'profile_photo_path' => 'qqq',
            'branch_id' => '2',
            'first_name' => 'a',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09955556374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',
        ]);
        $userNoor->assignRole('Accountant');

        // user 3 -> 10
        for ($i = 3; $i < 10; $i++)
            $userClauda = User::create([
                'code' => $i,
                'name' => 'Clauda Al-Rakkad' . $i,
                'email' => "clauda@gmail$i.com",
                'password' => bcrypt('12345clauda'),
                'branch_name' => 'Main Branch',
                'role' => 'Casher',
                'branch_id' => '3',
                'first_name' => 's',
                'middle_name' => 's',
                'last_name' => 's',
                'phone' => '09913646374',
                'mobile' => '0414949494',
                'id_number' => '001123938373774',
            ]);
        $userClauda->assignRole('Cacher');
        $userClauda->givePermissionTo('store-user');
    }
}
