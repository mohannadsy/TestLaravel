<?php

namespace App\Traits\Account;

use App\Models\Account;


trait  AccountTrait
{


    public function isFinal($id)
    {
        $account = Account::find($id);
        return $account->is_final == true;
    }

    public function isClient($id)
    {
        $account = Account::find($id);
        return $account->is_client == true;
    }

    public function isAggregateAccount($id)
    {
        $account = Account::find($id);
        return $account->is_aggregate == true;
    }

    public function isDistributiveAccount($id)
    {
        $account = Account::find($id);
        return $account->is_distributive == true;
    }


}
