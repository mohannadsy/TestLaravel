<?php

namespace App\Traits\Currency;

trait  CurrencyTrait {


    public function isDefaultAccuracy($id)
    {
        return $id == 1;
    }

    public function isNotDefaultAccuracy($id)
    {
        return !$this->isDefaultAccuracy($id);
    }

}
