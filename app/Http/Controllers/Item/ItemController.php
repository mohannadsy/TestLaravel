<?php

namespace App\Http\Controllers\Item;


use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Traits\ActivityLog\ActivityLog;

class ItemController extends Controller
{
    use ActivityLog;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'items',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return $items = Item::all();


    }


    public function store(StoreItemRequest $request)
    {
        $id = Item::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $item = Item::create($request->all());
        $this->callActivityMethod('store', $parameters);
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $item = Item::find($id);
        if ($item) {
            $this->callActivityMethod('show', $parameters);
            return $item;
        }
        return 'Item Not Found';
    }


    public function update(StoreItemRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $item = Item::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }

    public function delete($id)
    {
        $parameters = ['id' => $id];
        $item = Item::find($id);
        return $item ? $item->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Item not Found';
    }

}
