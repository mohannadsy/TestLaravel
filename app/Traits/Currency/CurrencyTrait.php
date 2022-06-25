<?php

namespace App\Traits\Currency;

trait  CurrencyTrait {


    public function isDefaultBound($id)
    {
        return $id == 1;
    }

    public function isNotDefaultBound($id)
    {
        return !$this->isDefaultBound($id);
    }

}
