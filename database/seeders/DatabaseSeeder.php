<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            BranchSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CurrencySeeder::class,
            CostCenterSeeder::class,
            AccountSeeder::class,
            PermissionGroupSeeder::class,
            ClientSeeder::class,
            StoreSeeder::class,
            UnitSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,


        ]);

    }
}
