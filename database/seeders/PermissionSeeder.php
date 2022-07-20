<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        //---------------users--------------------------//
        $storeUser = Permission::create([
            'name' => 'store-user',
            'permission_group_id' => 1,
            'caption_ar' => 'إضافة مستخدم ',
            'caption_en' => 'store-user ',

        ]);
        $updateUser = Permission::create([
            'name' => 'update-user',
            'permission_group_id' => 1,
            'caption_ar' => 'تعديل مستخدم ',
            'caption_en' => 'update-user ',

        ]);
        $deleteUser = Permission::create([
            'name' => 'delete-user',
            'permission_group_id' => 1,
            'caption_ar' => 'حذف مستخدم ',
            'caption_en' => 'delete-user ',

        ]);
        $showUser = Permission::create([
            'name' => 'show-user',
            'permission_group_id' => 1,
            'caption_ar' => 'عرض مستخدم ',
            'caption_en' => 'show-user ',

        ]);
        $showUser = Permission::create([
            'name' => 'show-user',
            'permission_group_id' => 1,
            'caption_ar' => 'عرض مستخدم ',
            'caption_en' => 'show-user ',

        ]);
        $showUser = Permission::create([
            'name' => 'show-user',
            'permission_group_id' => 1,
            'caption_ar' => 'عرض مستخدم ',
            'caption_en' => 'show-user ',

        ]);
        //---------------roles--------------------------//
        $storeRole = Permission::create([
            'name' => 'store-role',
            'permission_group_id' => 2,
            'caption_ar' => 'إضافة دور  ',
            'caption_en' => 'store-role ',

        ]);
        $updateRole = Permission::create([
            'name' => 'update-role',
            'permission_group_id' => 2,
            'caption_ar' => 'تعديل دور  ',
            'caption_en' => 'update-role ',

        ]);
        $deleteRole = Permission::create([
            'name' => 'delete-role',
            'permission_group_id' => 2,
            'caption_ar' => 'حذف دور نهائيا ',
            'caption_en' => 'delete-role ',

        ]);
        $showRole = Permission::create([
            'name' => 'show-role',
            'permission_group_id' => 2,
            'caption_ar' => 'عرض دور   يا جماعة ',
            'caption_en' => 'show-role ',

        ]);
        $showRole = Permission::create([
            'name' => 'show-role',
            'permission_group_id' => 2,
            'caption_ar' => 'عرض دور  ',
            'caption_en' => 'show-role => Showwwwwwww Role ',

        ]);
        //---------------permissions--------------------------//
        $storePermission = Permission::create([
            'name' => 'store-permission',
            'permission_group_id' => 3,
            'caption_ar' => 'إضافة صلاحية  ',
            'caption_en' => 'store-permission ',

        ]);
        $updatePermission = Permission::create([
            'name' => 'update-permission',
            'permission_group_id' => 3,
            'caption_ar' => 'تعديل صلاحية  ',
            'caption_en' => 'update-permission',

        ]);
        $deletePermission = Permission::create([
            'name' => 'delete-permission',
            'permission_group_id' => 3,
            'caption_ar' => 'حذف صلاحية حذف صلاحية  ',
            'caption_en' => 'delete-permission delete-permission ',

        ]);
//        $showPermission = Permission::create([
//            'name' => 'show-permission',
//            'permission_group_id' => 3,
//            'caption_ar' => 'عرض صلاحية  ',
//            'caption_en' => 'show-permission',
//
//        ]);
    }
}
