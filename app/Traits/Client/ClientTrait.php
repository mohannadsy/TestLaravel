<?php

namespace App\Traits\Client;

use App\Models\Category;
use App\Models\Item;

trait  ClientTrait
{
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'accounts',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
}
