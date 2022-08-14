<?php

namespace App\Traits\Account;

use App\Models\Account;


trait  AccountTrait
{

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'accounts',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
    public function isFinal($id) // ختامي
    {
        $account = Account::find($id);
        return $account->is_final == true;
    }

    public function isClient($id) // عميل
    {
        $account = Account::find($id);
        return $account->is_client == true;
    }

    public function isAggregateAccount($id) // تجميعي
    {
        $account = Account::find($id);
        return $account->is_aggregate == true;
    }

    public function isDistributiveAccount($id) // توزيعي
    {
        $account = Account::find($id);
        return $account->is_distributive == true;
    }


}
