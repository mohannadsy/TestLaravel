<?php

namespace App\Traits\Category;

use App\Models\Category;

trait  CategoryTrait
{

    public function isContainItems($id)
    {
        return $category = Category::withCount('items') > 0;

    }

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'categories',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
}
