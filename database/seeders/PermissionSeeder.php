<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        //---------------users--------------------------//
        $storeUser = Permission::create(['name' => 'store-user', 'permission_group_id' => 1,
            'caption'=>json_decode(  '[{
               "lang" : "ar",
                "name" : "أول"
                } ,
                 {
                "lang" : "en",
                "name" : "ثاني"
                }] '
            )
        ]);
//        $updateUser = Permission::create(['name' => 'update-user', 'permission_group_id' => 1]);
//        $deleteUser = Permission::create(['name' => 'delete-user', 'permission_group_id' => 1]);
//        $showUser = Permission::create(['name' => 'show-user', 'permission_group_id' => 1]);
//        //---------------roles--------------------------//
//        $storeRole = Permission::create(['name' => 'store-role', 'permission_group_id' => 2]);
//        $updateRole = Permission::create(['name' => 'update-role', 'permission_group_id' => 2]);
//        $deleteRole = Permission::create(['name' => 'delete-role', 'permission_group_id' => 2]);
//        $showRole = Permission::create(['name' => 'show-role', 'permission_group_id' => 2]);
//        //---------------permissions--------------------------//
//        $storePermission = Permission::create(['name' => 'store-permission', 'permission_group_id' => 3]);
//        $updatePermission = Permission::create(['name' => 'update-permission', 'permission_group_id' => 3]);
//        $deletePermission = Permission::create(['name' => 'delete-permission', 'permission_group_id' => 3]);
//        $showPermission = Permission::create(['name' => 'show-permission', 'permission_group_id' => 3]);
    }
}
