<?php


namespace App\Traits;

use App\Models\Activity;
use App\Models\Trash;
use Illuminate\Support\Facades\Auth;

trait  ActivityLog
{
    public function makeActivity($activity)
    {
        if ($activity['operation'] == 'update')
            Activity::create([
                'table' => $activity['model'],
                'operations' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id' => $activity[id],
                'old_data' => 'data'
            ]);
        elseif ($activity['operation'] == 'delete')
            Trash::create([
                'table' => $activity['model'],
                'user_id' => Auth::id(),
                'table_id' => $activity['id'],
            ]);
        else
            Activity::create([
                'table' => $activity['model'],
                'operations' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id' => $activity['id'],

            ]);
    }
}


