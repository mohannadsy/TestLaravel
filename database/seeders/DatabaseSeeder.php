<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
<<<<<<< HEAD
//            PermissionSeeder::class,
//            RoleSeeder::class,
            BranchSeeder::class,
//            UserSeeder::class,
//            CurrencySeeder::class,
//            CostCenterSeeder::class,
//            AccountSeeder::class,
//            PermissionGroupSeeder::class
=======
            PermissionSeeder::class,
            RoleSeeder::class,
            BranchSeeder::class,
            UserSeeder::class,
            CurrencySeeder::class,
            CostCenterSeeder::class,
            AccountSeeder::class,
            PermissionGroupSeeder::class
>>>>>>> 5726bfa83f45d20ce196f60352b9213300512dfa
        ]);

    }
}
