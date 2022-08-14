<?php

namespace App\Traits\Item;

use Illuminate\Http\Request;

use Illuminate\Support\Str;


trait  ItemTrait
{
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'items',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
}
