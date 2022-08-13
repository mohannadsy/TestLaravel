<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;

use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Category\CategoryTrait;
use Inertia\Inertia;

class CategoryController extends Controller
{
    use CategoryTrait, ActivityLog;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'categories',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('get All Category ', $parameters);
        $categoryWithItems = Category::with('items')->select('id','code', 'name')->get();
//        return $categoryWithItems;
        return inertia('', compact('categoryWithItems'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $id = Category::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $category = Category::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('', compact('category'));;
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $category = Category::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $category = Category::find($id);
        if ($category) {
            $this->callActivityMethod('show', $parameters);
            return $category;
        }
        return __('category.category delete error');
    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotContainItems($id)) {
            $category = Category::find($id);
            return $category ? $category->delete() && $this->callActivityMethod('delete  ', $parameters) : __('category.category delete error');
        }
        return __('category.category delete error');
    }
}
