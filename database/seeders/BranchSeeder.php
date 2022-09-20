<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        Branch::create([
            'code' => '1',
            'name' => 'Main Branch',
            'branch_id' => null,
            'responsibility' => '',
            'address' => '',
            'website' => 'mainbranch.com',
            'email' => 'mainbranch@gmail.com',
            'phone' => '041877645',
            'mobile' => '0994848736',
            'is_active' => true,
            'security_degree' => 1 // سرية
        ]);
        Branch::create([
            'code' => '101',
            'name' => 'Branch1',
            'branch_id' => 1,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch1.com',
            'email' => 'branch1@gmail.com',
            'phone' => '0412088635',
            'mobile' => '0948943236',
            'is_active' => false,
            'security_degree' => 1 // سرية
        ]);

        Branch::create([
            'code' => '102',
            'name' => 'Branch2',
            'branch_id' => 2,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch2.com',
            'email' => 'branch2@gmail.com',
            'phone' => '043325645',
            'mobile' => '0093648736',
            'is_active' => true,
            'security_degree' => 3 // سرية
        ]);
        Branch::create([
            'code' => '10101',
            'name' => 'Branch3',
            'branch_id' => 2,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch3.com',
            'email' => 'branch3@gmail.com',
            'phone' => '041878875',
            'mobile' => '09940935736',
            'is_active' => true,
            'security_degree' => 1 // سرية
        ]);
        Branch::create([
            'code' => 'B9',
            'name' => 'Branch4',
            'branch_id' => 2,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch4.com',
            'email' => 'brancwqfh4@gmail.com',
            'phone' => '041078875',
            'mobile' => '09944935736',
            'is_active' => true,
            'security_degree' => 1 // سرية
        ]);
        Branch::create([
            'code' => '133',
            'name' => 'Branch5',
            'branch_id' => 1,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'branchece5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
        Branch::create([
            'code' => '13436',
            'name' => 'Branch6',
            'branch_id' => 5,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'branwdwech5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
        Branch::create([
            'code' => '13336',
            'name' => 'Branch7',
            'branch_id' => 5,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'branvvrch5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
        Branch::create([
            'code' => '132236',
            'name' => 'Branch8',
            'branch_id' => 7,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'branvvch5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
        Branch::create([
            'code' => '1232336',
            'name' => 'Branch9',
            'branch_id' => 7,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'brancrrh5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
        Branch::create([
            'code' => '13362332',
            'name' => 'Branch10',
            'branch_id' => 9,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'brarrnch5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
        Branch::create([
            'code' => '133232036',
            'name' => 'Branch11',
            'branch_id' =>9,
            'responsibility' => '',
            'address' => '',
            'website' => 'branch5.com',
            'email' => 'brranch5@gmail.com',
            'phone' => '04107855875',
            'mobile' => '09944449',
            'is_active' => false,
            'security_degree' => 3,

        ]);
    }
}
