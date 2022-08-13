<?php

namespace App\Traits\Category;

use App\Models\Category;
use App\Models\Item;

trait  CategoryTrait
{
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'categories',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }
    public function isContainItems($id)
    {
//        $category = Category::withCount('items')->get();
//        return count($category) > 0;

        $items = Item::where('category_id', $id)->get();
        return count($items) > 0;

    }

    public function isNotContainItems($id)
    {
        return !$this->isContainItems($id);

    }


}
