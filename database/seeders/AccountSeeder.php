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
            'name' => 'account1',
            'code' => '1',
            'latin_name' => '',
            'type' => 'normal',
            'account_id' => 1,
            'is_final' => false,
            'is_active' => false,
            'is_client' => false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 'creditor  ',
            'budget_value' => 0,
            'nature' => 'normal',
            'division_rate' => '  ',
            'rates_sum' => '',
            'creditor' => '',
            'debtor' => '',
            'balance' => 0,
            'notes' => ' ',
            'debtor_and_creditor' => '',
            'not_debtor_not_creditor' => '',
            'is_aggregate' => false,
            'is_distributive' => false,
            'security_degree' => 1,// سرية
            'aggregate_ids' => [
               1,2,3
            ],
            'distributive_ids' => [
                1,2,3
            ],
            'branch_id' => 1
        ]);

        $finalAccount = Account::create([
            'name' => 'account2',
            'code' => '2',
            'latin_name' => '',
            'type' => 'aggregate',
            'account_id' => 1,
            'is_final' => false,
            'is_active' => false,
            'is_client' => false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 'creditor  ',
            'budget_value' => 0,
            'nature' => 'normal',
            'division_rate' => '  ',
            'rates_sum' => '',
            'creditor' => '',
            'debtor' => '',
            'balance' => 0,
            'notes' => ' ',


            'debtor_and_creditor' => '',
            'not_debtor_not_creditor' => '',
            'is_aggregate' => false,
            'is_distributive' => false,
            'security_degree' => 2, // سرية
            'aggregate_ids' => [
                1,2,3
            ],
            'distributive_ids' => [
                1,2,3
            ],
            'branch_id' => 2,
        ]);

        $account2 = Account::create([
            'name' => 'account3',
            'code' => '3',
            'latin_name' => '',
            'type' => 'distributive',
            'account_id' => 1,
            'is_final' => false,
            'is_active' => false,
            'is_client' => false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 'creditor  ',
            'budget_value' => 0,
            'nature' => 'normal',
            'division_rate' => '  ',
            'rates_sum' => '',
            'creditor' => '',
            'debtor' => '',
            'balance' => 0,
            'notes' => ' ',
            'debtor_and_creditor' => '',
            'not_debtor_not_creditor' => '',
            'is_aggregate' => false,
            'is_distributive' => false,
            'security_degree' => 3, // سرية

            'aggregate_ids' => [
                1,2,7
            ],
            'distributive_ids' => [
                1,2,7
            ],
            'branch_id' => 3,
        ]);


        $account3 = Account::create([
            'name' => 'account4',
            'code' => '4',
            'latin_name' => '',
            'type' => 'normal',
            'account_id' => 1,
            'is_final' => false,
            'is_active' => false,
            'is_client' => false,
            'final_account_id' => 1,
            'cost_center_id' => 0,
            'currency_id' => 0,
            'equality' => 0,
            'budget' => 'creditor  ',
            'budget_value' => 0,
            'nature' => 'normal',
            'division_rate' => '  ',
            'rates_sum' => '',
            'creditor' => '',
            'debtor' => '',
            'balance' => 0,
            'notes' => ' ',
            'debtor_and_creditor' => '',
            'not_debtor_not_creditor' => '',
            'is_aggregate' => true,
            'is_distributive' => true,
            'security_degree' => 4, // سرية

            'aggregate_ids' => [
                2,3,7
            ],
            'distributive_ids' => [
                2,3,7
            ],
            'branch_id' => 4,
        ]);

    }
}
