<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\Concerns\Has;

class UserSeeder extends Seeder
{
    public function run()
    {
        // user 1
        $userMohannad = User::create([
            'code' => 'A11',
            'name' => 'Super Admin',
            'email' => 'superAdmin@gmail.com',
//            'password' => bcrypt('12345superadmin'),
            'password' => Hash::make('12345superadmin'),

            'role' => 'Admin',// مدير عام
            'branch_id' => 3,
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
        $userMohannad->assignRole('Accountant');
//        $userMohannad->assignRole('Accountant');
        $userMohannad->givePermissionTo('update-permission');
        $userMohannad->givePermissionTo('store-user');
        $userMohannad->givePermissionTo('delete-user');
        $userMohannad->givePermissionTo('show-user');
        // user 2
        $userNoor = User::create([
            'code' => 'U2',
            'name' => 'Noor Al-kinj',
            'email' => 'noor@gmail.com',
//            'password' => bcrypt('12345noor'),
            'password' => Hash::make('12345noor'),

            'role' => 'Accountant',
            'profile_photo_path' => 'qqq',
            'branch_id' => 1,
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
//        for ($i = 3; $i <= 6; $i++)
        $userClauda = User::create([
            'code' => 'U3',
            'name' => 'Clauda Al-Rakkad',
            'email' => "clauda@gmail.com",
//                'password' => bcrypt('12345clauda'),
            'password' => Hash::make('12345clauda'),

            'role' => 'Cacher',
            'branch_id' => 2,
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
        $userClauda->assignRole('Admin');
        $userClauda->givePermissionTo('store-user');


        $userSara = User::create([
            'code' => 'U4',
            'name' => 'Sara Abdo',
            'email' => 'sara@gmail.com',
//            'password' => bcrypt('12345sara'),
            'password' => Hash::make('12345sara'),
            'role' => 'Accountant',
            'profile_photo_path' => 'qqq',
            'branch_id' => 4,
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
            'security_level' => 1,

        ]);
        $userSara->assignRole('Accountant');


        $userRaghad = User::create([
            'code' => 'U5',
            'name' => 'Raghad Nanou',
            'email' => 'raghad@gmail.com',
//            'password' => bcrypt('12345raghad'),
            'password' => Hash::make('12345raghad'),
            'role' => 'Accountant',
            'profile_photo_path' => 'qqq',
            'branch_id' => 2,
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
        $userRaghad->assignRole('Cacher');

    }
}
