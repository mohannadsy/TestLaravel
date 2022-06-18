<?php


namespace App\Traits;

use App\Models\Activity;
use App\Models\Branch;
use App\Models\Trash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
