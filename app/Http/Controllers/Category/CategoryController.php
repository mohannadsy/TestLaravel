<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Traits\Category\CategoryTrait;
use Inertia\Inertia;

class CategoryController extends Controller
{
 use CategoryTrait;
    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Category::all();
    }

    public function store(CategoryRequest $request)
    {
        $id = Category::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $category =  Category::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('', compact('category'));;
    }

    public function update(CategoryRequest $request, $id)
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
        return 'Category not Found';
    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        if (!$this->isContainItems($id)) {
            $category = Category::find($id);
            return $category ? $category->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Category not Found';
        }
        return "Default Category Can not be Deleted";
    }
}
