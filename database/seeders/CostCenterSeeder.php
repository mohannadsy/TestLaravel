<?php

namespace Database\Seeders;

use App\Models\CostCenter;
use Illuminate\Database\Seeder;

class CostCenterSeeder extends Seeder
{
    public function run()
    {
        CostCenter::create([
            'code' => '1',
            'name' => 'MainCostCenter ',
            'latin_name' => '',
            'center_id' => null,
            'balance' => '500',
            'in_balance' => '200',
            'out_balance' => '300',
            'notes' => '',
            'confidentiality_degree' => 1 // سرية
        ]);
        CostCenter::create([
            'code' => '2',
            'name' => 'CostCenter1 ',
            'latin_name' => '',
            'center_id' => '1',
            'balance' => '600',
            'in_balance' => '300',
            'out_balance' => '300',
            'notes' => '',
            'confidentiality_degree' => 4 // سرية
        ]);

        CostCenter::create([
            'code' => '3',
            'name' => 'CostCenter2 ',
            'latin_name' => 'hhh',
            'center_id' => '1',
            'balance' => '200',
            'in_balance' => '100',
            'out_balance' => '100',
            'notes' => '',
            'confidentiality_degree' => 3 // سرية
        ]);
        CostCenter::create([
            'code' => '4',
            'name' => 'CostCenter3 ',
            'latin_name' => '',
            'center_id' => null,
            'balance' => '300',
            'in_balance' => '200',
            'out_balance' => '100',
            'notes' => '',
            'confidentiality_degree' => 1 // سرية
        ]);
        CostCenter::create([
            'code' => '5',
            'name' => 'CostCenter4 ',
            'latin_name' => '',
            'center_id' => null,
            'balance' => '400',
            'in_balance' => '200',
            'out_balance' => '200',
            'notes' => '',
            'confidentiality_degree' => 1 // سرية
        ]);
        CostCenter::create([
            'code' => '6',
            'name' => 'CostCenter5 ',
            'latin_name' => '',
            'center_id' => null,
            'balance' => '800',
            'in_balance' => '400',
            'out_balance' => '400',
            'notes' => '',
            'confidentiality_degree' => 1 // سرية
        ]);
    }
}
