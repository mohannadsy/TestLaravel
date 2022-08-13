<?php

namespace App\Traits\Store;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


trait  StoreTrait
{
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'stores',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function numOfSubStores($id)
    {
        $SubStores = Store::where('store_id', $id)->get();
        return count($SubStores);
    }

    public function isRootStore($id)
    {
        return $id == 1;
    }

    public function isNotRootStore($id)
    {
        return !$this->isRootStore($id);
    }




}
