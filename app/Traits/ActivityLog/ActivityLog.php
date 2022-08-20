<?php


namespace App\Traits\ActivityLog;

use App\Models\Activity;
use App\Models\Attachment;
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
                'old_data' => $activity['parameters']['old_data'],
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
//        if ($activity['parameters']['attachment_id'])
            Attachment::create([
                'table' => $activity['table'],
                'table_id' => $activity['parameters']['id'],
            ]);
    }


}
