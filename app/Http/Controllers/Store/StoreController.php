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
        $storesData = Store::where('is_active', true)->select('id', 'name', 'code', 'store_id')->get(); // auto complete

        $this->callActivityMethod('getAllStores', $parameters);

//        return $storesData;
        return inertia('Store/Index', compact('stores','storesData'));

    }


    public function store(StoreStoreRequest $request)
    {
        $id = Store::orderBy('id', 'desc')->first()->id + 1;
        Store::create($request->all());
        $parameters = ['request' => $request, 'id' => $id];
        $this->callActivityMethod('store', $parameters);
        return __('common.store') ;
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $store = Store::find($id);
        if ($store) {
            $this->callActivityMethod('show', $parameters);
            return $store;
        }
        return __('store.store show');
    }


    public function update(UpdateStoreRequest $request, $id)
    {
        $old_data=Store::find($id)->toJson();
        $parameters = ['request' => $request, 'id' => $id,'old_data'=>$old_data];
        $store = Store::find($id);
        if ($this->isRootStore($id))
        {
            $Store = $store->update($request->except('store_id'));
        }
        else
            $Store=$store->update($request->all());
        $this->callActivityMethod('update', $parameters);
        return __('common.update');
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
