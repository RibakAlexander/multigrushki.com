<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloqModel;
use Illuminate\Support\Facades\DB;

class Model extends EloqModel
{
    protected static $description;

    public static function getTableName(){
        return with(new static)->getTable();
    }

    public static function getPrimaryKey(){
        return with(new static)->primaryKey;
    }

}
