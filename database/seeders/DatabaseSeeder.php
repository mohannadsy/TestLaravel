<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class
DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
//            PermissionSeeder::class,
//            RoleSeeder::class,
//            BranchSeeder::class,
//            UserSeeder::class,

        ]);

        Activity::create([
            'table' => 'User',
            'operation' => 'create',
            'user_id' => Auth::id(),
            'table_id' => User::last()->id,
        ]);
    }
}
