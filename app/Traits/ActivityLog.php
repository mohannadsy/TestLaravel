<?php


namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait  ActivityLog{
    public function makeActivity ($activity){
        if($activity['operation'] == 'update')
        Activity::create([
                'name' => $activity['model'],
                'operations' => $activity['operation'],
                'user_id' => Auth::id(),
//                'table_id'=>$activity['parameters']->id,
                'old_data' => 'data'
            ]);
        else
        Activity::create([
                'name' => $activity['model'],
                'operations' => $activity['operation'],
                'user_id' => Auth::id(),
//                'table_id'=>$activity['parameters']->id,
                'old_data' => null
            ]);
    }
}


