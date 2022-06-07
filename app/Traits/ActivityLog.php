<?php


namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait  ActivityLog{
    public function makeActivity ($activity){
        if($activity['operation'] == 'update')
        ActivityLog::create([
                'name' => $activity['model'],
                'operations' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id'=>$activity['parameters']->id,
                'old_data' => 'data'
            ]);
        else
        ActivityLog::create([
                'name' => $activity['model'],
                'operations' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id'=>$activity['parameters']->id,
                'old_data' => null
            ]);
    }
}


