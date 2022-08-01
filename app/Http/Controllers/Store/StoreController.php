<?php

namespace App\Http\Controllers\Store;


use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Traits\ActivityLog\ActivityLog;

class StoreController extends Controller
{
    use ActivityLog;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'stores',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Store::all();
    }


    public function store(StoreStoreRequest $request)
    {
        $id = Store::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $store = Store::create($request->all());
        $this->callActivityMethod('store', $parameters);
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $store = Store::find($id);
        if ($store) {
            $this->callActivityMethod('show', $parameters);
            return $store;
        }
        return 'Item Not Found';
    }


    public function update(StoreStoreRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $store = Store::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }

    public function delete($id)
    {
        $parameters = ['id' => $id];
        $store = Store::find($id);
        return $store ? $store->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Store not Found';
    }
}
