<?php

namespace Database\Seeders;

use App\Models\Attachment;
use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            AttachmentSeeder::class,
            ImagesSeeder::class,
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
