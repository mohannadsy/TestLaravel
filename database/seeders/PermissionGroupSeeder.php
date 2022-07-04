<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPermissionGroup = PermissionGroup::create([
            'name' => 'User Permission Group',
            'caption' => ["{
                'lang' => '',
                'name' => '  '}"]
        ]);
        $rolePermissionGroup = PermissionGroup::create([
            'name' => 'Role Permission Group 1',
            'caption' => ["  {
                'lang' => '',
                'name' => ''
                  }"]
        ]);
        $permissionsPermissionGroup = PermissionGroup::create([ // WOW
            'name' => 'Permissions Permission Group 1',

            'caption' =>
                ["  {
                'lang' => '',
                'name' => ''
        }"]
        ]);

    }
}
