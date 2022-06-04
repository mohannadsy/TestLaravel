<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleAccoutanat = Role::create(['name' => 'Accountant']);
        $roleCacher = Role::create(['name' => 'Cacher']);

        //-----give permissions to Admin Role-----//
        $roleAdmin->givePermissionTo('store-user');
        $roleAdmin->givePermissionTo('update-user');
        $roleAdmin->givePermissionTo('delete-user');
        $roleAdmin->givePermissionTo('show-user');
        $roleAdmin->givePermissionTo('store-role');
        $roleAdmin->givePermissionTo('update-role');
        $roleAdmin->givePermissionTo('show-role');
        $roleAdmin->givePermissionTo('delete-role');
        $roleAdmin->givePermissionTo('show-permission');
        $roleAdmin->givePermissionTo('store-permission');
        $roleAdmin->givePermissionTo('update-permission');
        $roleAdmin->givePermissionTo('delete-permission');
        $roleAdmin->givePermissionTo('show-permission');
        //-----give permissions to Manager Role-----//
        $roleAccoutanat->givePermissionTo('store-role');
        $roleAccoutanat->givePermissionTo('update-role');
        $roleAccoutanat->givePermissionTo('delete-role');
        $roleAccoutanat->givePermissionTo('show-role');
        //-----give permissions to Owner Role-----//
        $roleCacher->givePermissionTo('store-user');
        $roleCacher->givePermissionTo('update-user');
        $roleCacher->givePermissionTo('delete-user');
        $roleCacher->givePermissionTo('show-user');
        //-----give permissions to User Role-----//

    }
}
