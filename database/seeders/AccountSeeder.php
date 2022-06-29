<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{

    public function run()
    {
        $account = Account::create([
            'name'=>'account',
            'code'=>'1',
            'latin_name'=>'',
            'type'=>'normal',
            'account_id'=>'1',
            'final_account'=>'',
            'cost_center_id'=>'',
            'currency_id'=>'',
            'equality'=>'',
            'budget'=>'',
            'nature'=>'',
            'current_balance'=>'',
            'results'=>'',
            'notes'=>'',
        ]);
    }
}
