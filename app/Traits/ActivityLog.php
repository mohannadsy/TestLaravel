<?php


namespace App\Traits;

use App\Models\Activity;
use App\Models\Trash;
use Illuminate\Support\Facades\Auth;

trait  ActivityLog
{
    public function makeActivity($activity)
    {
        if ($activity['operation'] == 'update') {
            Activity::create([
                'table' => $activity['table'],
                'operation' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id' => $activity['parameters']['id'],

                'old_data' => 'data',

//                'old_data' => 'data',
            ]);
        } elseif ($activity['operation'] == 'delete') {
            Trash::create([
                'table' => $activity['table'],
                'user_id' => Auth::id(),
                'table_id' => $activity['parameters']['id'],

            ]);
            Activity::create([
                'table' => $activity['table'],
                'operation' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id' => $activity['parameters']['id'],
//                'old_data' => 'data',
            ]);
        } else
            Activity::create([
                'table' => $activity['table'],
                'operation' => $activity['operation'],
                'user_id' => Auth::id(),
                'table_id' => $activity['parameters']['id'],
            ]);
    }
}


