<?php

namespace Database\Seeders;

use App\Models\Bransh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranshSeeder extends Seeder
{

    public function run()
    {
        Bransh::create([
            'name' => 'Main Branch',
            'main_branch_id' => '1',
            'responsibility' => '',
            'address' => '',
            'website' => 'mainbranch.com',
            'email' => 'mainbranch@gmail.com',
            'phone' => '041877645',
            'mobile' => '0994848736'
        ]);

    }
}
