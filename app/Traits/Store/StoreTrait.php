<?php

namespace App\Traits\Store;

use App\Models\Attachment;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


trait  StoreTrait
{
    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'stores',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function numOfSubStores($id)
    {
        $SubStores = Store::where('store_id', $id)->get();
        return count($SubStores);
    }

    public function isRootStore($id)
    {
        return $id == 1;
    }

    public function isNotRootStore($id)
    {
        return !$this->isRootStore($id);
    }


    public function  StoreAttachments($id){
                return Attachment::with('attachments')->find($id);

//        return Attachment::with('branch')->get();
//        =>function($q){
//            $q->select('attachment_id')->get();
//        }]



//        return Attachment::with('store')->get();
//                return Store::with(['attachments'=>function($q){
//                    $q->select('name')->get();
//                }])->select('name')->find($id);

    }


}
