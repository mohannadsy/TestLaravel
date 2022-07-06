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
}
