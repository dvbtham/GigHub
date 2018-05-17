<?php

namespace Database\Helpers;

use DB;

class QueryBuilderHelper
{
    public static function getTableId($table_name, $id_colunm)
    {
        $ids_from_db = DB::table($table_name)->select($id_colunm)->get();

        $ids = [];

        foreach($ids_from_db as $id)
            $ids[] = $id->$id_colunm;

        return rand(min($ids), max($ids));
    }
}
