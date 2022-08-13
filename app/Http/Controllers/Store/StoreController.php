<?php

namespace App\Http\Controllers\Store;


use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Store\StoreTrait;

class StoreController extends Controller
{
    use ActivityLog ,StoreTrait;



    public function index()
    {
        $parameters = ['id' => null];
        $stores = Store::whereNull('store_id')->with('stores')->select('id', 'name', 'code', 'store_id')->get();// for tree
        $this->callActivityMethod('getAllStores', $parameters);

//        return $stores;
        return inertia('Store/Index', compact('stores'));

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


    public function update(UpdateStoreRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $store = Store::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }

    public function delete($id)
    {
        $parameters = ['id' => $id];
        $store = Store::find($id);
        if ($this->isRootStore($id))
            return __('store.Root Store delete');
        if (!$this->numOfSubStores($id) > 0) {
            $store->delete();
            $this->callActivityMethod('delete', $parameters);
            return __('common.delete');
        } else
            return __('store.store delete');
    }

}
