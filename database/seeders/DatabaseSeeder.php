<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            BranchSeeder::class,
            UserSeeder::class,
            CurrencySeeder::class,
            CostCenterSeeder::class,
            AccountSeeder::class,
            PermissionGroupSeeder::class,
            ClientSeeder::class,
            StoreSeeder::class,
            ItemSeeder::class,
            CategorySeeder::class,
        ]);

    }
}
