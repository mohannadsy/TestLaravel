<?php

namespace App\Traits\Unit;


trait  UnitTrait
{
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'units',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
    public function isDefaultUnit($id)
    {
        return $id == 1;
    }

    public function isNotDefaultUnit($id)
    {
        return !$this->isDefaultUnit($id);
    }

}
