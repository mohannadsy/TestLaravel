<?php

namespace App\Http\Controllers\Item;


use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Store;
use App\Traits\ActivityLog\ActivityLog;

class ItemController extends Controller
{
    use ActivityLog;



    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return $items = Item::all();

    }


    public function store(StoreItemRequest $request)
    {
//        $id = Item::latest()->first()->id + 1;

        $id = Item::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $item = Item::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return __('common.store') ;
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $item = Item::find($id);
        if ($item) {
            $this->callActivityMethod('show', $parameters);
            return $item;
        }
        return 'store.store show';
    }


    public function update(UpdateItemRequest $request, $id)
    {
        $old_data=Store::find($id)->toJson();
        $parameters = ['request' => $request, 'id' => $id,'old_data'=>$old_data];
        $item = Item::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
        return __('common.update');
    }




    public function delete($id)
    {
        $parameters = ['id' => $id];
        $item = Item::find($id);
//        if ($item)
        $item->delete();
        $this->callActivityMethod('delete  ', $parameters) ;
        return __('common.delete');
    }

}
