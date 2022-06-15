<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        Branch::create([
            'code' => '1',
            'name' => 'Main Branch',
            'branch_id'      => null,
            'responsibility' => '',
            'address' => '',
            'website' => 'mainbranch.com',
            'email' => 'mainbranch@gmail.com',
            'phone' => '041877645',
            'mobile' => '0994848736',
        ]);
        Branch::create([
            'code' => '2',
            'name' => 'Branch1',
            'branch_id' => '1 ',
            'responsibility' => '',
            'address' => '',
            'website' => 'branch1.com',
            'email' => 'branch1@gmail.com',
            'phone' => '0412088635',
            'mobile' => '0948943236',
        ]);

        Branch::create([
            'code' => '3',
            'name' => 'Branch2',
            'branch_id' => '2',
            'responsibility' => '',
            'address' => '',
            'website' => 'branch2.com',
            'email' => 'branch2@gmail.com',
            'phone' => '043325645',
            'mobile' => '0093648736',
        ]);
        Branch::create([
            'code' => '4',
            'name' => 'Branch3',
            'branch_id' => '3',
            'responsibility' => '',
            'address' => '',
            'website' => 'branch3.com',
            'email' => 'branch3@gmail.com',
            'phone' => '041878875',
            'mobile' => '09940935736',
        ]);
        Branch::create([
            'code' => '5',
            'name' => 'Branch4',
            'branch_id' => '3' ,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch4.com',
            'email' => 'branch4@gmail.com',
            'phone' => '041078875',
            'mobile' => '09944935736',
        ]);
    }
}
