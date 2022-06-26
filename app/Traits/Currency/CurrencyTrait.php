<?php

namespace App\Traits\Currency;

trait  CurrencyTrait {


    public function isDefaultCurrency($id)
    {
        return $id == 1;
    }

    public function isNotDefaultCurrency($id)
    {
        return !$this->isDefaultCurrency($id);
    }

}
