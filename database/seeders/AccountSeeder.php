<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{

    public function run()
    {
        $normalAccount = Account::create([
            'name' => 'account',
            'code' => '1',
            'latin_name' => '',
            'type' => 'normal',
            'account_id' => '1',
            'is_final'=>false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 0,
            'nature' => 'normal',
            'current_balance' => 0,
            'final_account_result_id' => 0,
            'notes' => ' ',
        ]);

        $finalAccount = Account::create([
            'name' => 'account',
            'code' => '1',
            'latin_name' => '',
            'type' => 'normal',
            'account_id' => '1',
            'is_final'=>false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 0,
            'nature' => 'normal',
            'current_balance' => 0,
            'final_account_result_id' => 0,
            'notes' => ' ',

        ]);

        $account2 = Account::create([
            'name' => 'account',
            'code' => '1',
            'latin_name' => '',
            'type' => 'normal',
            'account_id' => '1',
            'is_final'=>false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 1,
            'nature' => 'normal',
            'current_balance' => 0,
            'final_account_result_id' => 0,
            'notes' => '',
        ]);


        $account3 = Account::create([
            'name' => 'account',
            'code' => '1',
            'latin_name' => '',
            'type' => 'normal',
            'account_id' => '1',
            'is_final'=>false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 0,
            'nature' => 'normal',
            'current_balance' => 0,
            'final_account_result_id' => 0,
            'notes' => ' ',
        ]);

    }
}
