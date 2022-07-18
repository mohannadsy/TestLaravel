<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{

    public function run()
    {
        $userPermissionGroup = PermissionGroup::create([
            'name' => 'User Permission Group',
            'caption_ar' => 'صلاحيات المستخدمين',
            'caption_en' => 'User Permission ',
        ]);
        $rolePermissionGroup = PermissionGroup::create([
            'name' => 'Role Permission Group 1',
            'caption_ar' => 'صلاحيات الادوار',
            'caption_en' => 'role Permission ',
        ]);
        $permissionsPermissionGroup = PermissionGroup::create([ // WOW
            'name' => 'Permissions Permission Group 1',
            'caption_ar' => 'صلاحيات ',
            'caption_en' => ' Permission ',
        ]);

    }
}
