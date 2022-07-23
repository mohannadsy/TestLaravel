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
            'role' => 'Super Admin',// مدير عام
            'branch_id' => '1',
            'profile_photo_path' => 'qqq',
            'first_name' => 's',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09913646374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',
            'notes' => 'notes',
            'account_box_id' => 0,
            'store_id' => 0,
            'is_active' => true,
            'security_degree' => 2,
            'security_level' => 1
        ]);
        $userMohannad->assignRole('Admin');
        $userMohannad->assignRole('Accountant');
        $userMohannad->givePermissionTo('update-permission');
        $userMohannad->givePermissionTo('store-user');
        $userMohannad->givePermissionTo('delete-user');
        $userMohannad->givePermissionTo('show-user');
        // user 2
        $userNoor = User::create([
            'code' => '2',
            'name' => 'Noor Al-kinj',
            'email' => 'noor@gmail.com',
            'password' => bcrypt('12345noor'),

            'role' => 'Accountant',
            'profile_photo_path' => 'qqq',
            'branch_id' => '2',
            'first_name' => 'a',
            'middle_name' => 's',
            'last_name' => 's',
            'phone' => '09955556374',
            'mobile' => '0414949494',
            'id_number' => '001123938373774',
            'notes' => 'notes',
            'account_box_id' => 0,
            'store_id' => 0,
            'is_active' => false,
            'security_degree' => 1,
            'security_level' => 1
        ]);
        $userNoor->assignRole('Accountant');
        $userNoor->givePermissionTo('update-role');
        $userNoor->givePermissionTo('store-permission');


        // user 3 -> 10
        for ($i = 3; $i <= 6; $i++)
            $userClauda = User::create([
                'code' => $i,
                'name' => 'Clauda Al-Rakkad' . $i,
                'email' => "clauda@gmail$i.com",
                'password' => bcrypt('12345clauda'),
                'role' => 'Casher',
                'branch_id' => $i,
                'first_name' => 's',
                'middle_name' => 's',
                'last_name' => 's',
                'phone' => '09913646374',
                'mobile' => '0414949494',
                'id_number' => '001123938373774',
                'notes' => 'notes ',
                'account_box_id' => 0,
                'store_id' => 0,
                'is_active' => false,
                'security_degree' => 3,
                'security_level' => 1
            ]);
        $userClauda->assignRole('Cacher');
        $userClauda->givePermissionTo('store-user');
    }
}
