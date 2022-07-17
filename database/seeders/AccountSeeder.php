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
            'name'                       => 'account',
            'code'                       => '1',
            'latin_name'                 => '',
            'type'                       => 'normal',
            'account_id'                 => 1,
            'is_final'                   => false,
            'is_active'                  => false,
            'is_client'                  => false,
            'final_account_id'           => 1,
            'cost_center_id'             => 0,
            'currency_id'                => 0,
            'equality'                   => 0,
            'budget'                     => 'creditor  ',
            'budget_value'               => 0,
            'nature'                     => 'normal',
            'division_rate'              => '  ',
            'rates_sum'                  => '',
            'creditor'                   => '',
            'debtor'                     => '',
            'balance'                    => 0,
            'notes'                      => ' ',
            'debtor_and_creditor'        => '',
            'not_debtor_not_creditor'    => '',
            'is_aggregate'               => '',
            'is_distributive'            => ''
        ]);

        $finalAccount = Account::create([
            'name'                      => 'account',
            'code'                      => '1',
            'latin_name'                => '',
            'type'                      => 'normal',
            'account_id'                => 1,
            'is_final'                  => false,
            'is_active'                 => false,
            'is_client'                 => false,
            'final_account_id'          => 1,
            'cost_center_id'            => 0,
            'currency_id'               => 0,
            'equality'                  => 0,
            'budget'                    => 'creditor  ',
            'budget_value'              => 0,
            'nature'                    => 'normal',
            'division_rate'             => '  ',
            'rates_sum'                 => '',
            'creditor'                  => '',
            'debtor'                    => '',
            'balance'                   => 0,
            'notes'                     => ' ',

            'debtor_and_creditor'       => '',
            'not_debtor_not_creditor'   => '',
            'is_aggregate'              => '',
            'is_distributive'           => ''

        ]);

        $account2 = Account::create([
            'name'                       => 'account',
            'code'                       => '1',
            'latin_name'                 => '',
            'type'                       => 'normal',
            'account_id'                 => 1,
            'is_final'                   => false,
            'is_active'                  => false,
            'is_client'                  => false,
            'final_account_id'           => 1,
            'cost_center_id'             => 0,
            'currency_id'                => 0,
            'equality'                   => 0,
            'budget'                     => 'creditor  ',
            'budget_value'               => 0,
            'nature'                     => 'normal',
            'division_rate'              => '  ',
            'rates_sum'                  => '',
            'creditor'                   => '',
            'debtor'                     => '',
            'balance'                    => 0,
            'notes'                      => ' ',
            'debtor_and_creditor'        => '',
            'not_debtor_not_creditor'    => '',
            'is_aggregate'               => '',
            'is_distributive'            => ''
        ]);


        $account3 = Account::create([
            'name'                       => 'account',
            'code'                       => '1',
            'latin_name'                 => '',
            'type'                       => 'normal',
            'account_id'                 => 1,
            'is_final'                   => false,
            'is_active'                  => false,
            'is_client'                  => false,
            'final_account_id'           => 1,
            'cost_center_id'             => 0,
            'currency_id'                => 0,
            'equality'                   => 0,
            'budget'                     => 'creditor  ',
            'budget_value'               => 0,
            'nature'                     => 'normal',
            'division_rate'              => '  ',
            'rates_sum'                  => '',
            'creditor'                   => '',
            'debtor'                     => '',
            'balance'                    => 0,
            'notes'                      => ' ',
            'debtor_and_creditor'        => '',
            'not_debtor_not_creditor'    => '',
            'is_aggregate'               => '',
            'is_distributive'            => ''
        ]);

    }
}
