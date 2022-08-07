<?php

namespace App\Traits\Unit;


trait  UnitTrait
{

    public function isDefaultUnit($id)
    {
        return $id == 1;
    }

    public function isNotDefaultUnit($id)
    {
        return !$this->isDefaultUnit($id);
    }

}
