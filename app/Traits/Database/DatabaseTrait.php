<?php

namespace App\Traits\Database;


use Illuminate\Support\Facades\DB;

trait  DatabaseTrait
{
    public function databaseBackup()
    {

//        $query = 'mysql --user root --password [db_name] < [db_name].sql';

        return <<<SQL
'mysql --user root --password [laravell] < [Desktop].sql'
SQL;


//        DB::unprepared($query);
    }

}
