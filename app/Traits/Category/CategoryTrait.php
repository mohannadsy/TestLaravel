<?php

namespace App\Traits\Category;

use App\Models\Category;

trait  CategoryTrait
{

    public function isContainItems($id)
    {
         $category = Category::withCount('items')->get();
        return count($category) > 0;
    }


}
