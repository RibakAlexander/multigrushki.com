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

    public static function getAllWithStatus(){
        $table = self::getTableName();
        $pk = self::getPrimaryKey();
        $tableDesc = self::getDescription();
        $tableDesc = $tableDesc::getTableName();

        $pages = DB::table($table)
            ->join($tableDesc, "$table.$pk", '=', "$tableDesc.$pk")
            ->where("$table.status", 1)
            ->select()
            ->get();

        return $pages;
    }

    public static function getAll(){
        $table = self::getTableName();
        $pk = self::getPrimaryKey();
        $tableDesc = self::getDescription();
        $tableDesc = $tableDesc::getTableName();

        $page = DB::table($table)
            ->join($tableDesc, "$table.$pk", '=', "$tableDesc.$pk")
            ->select()
            ->get();

        return $page;
    }

    public static function getByID($id){
        if(!(int)$id) return null;
        $table = self::getTableName();
        $pk = self::getPrimaryKey();
        $tableDesc = self::getDescription();
        $tableDesc = $tableDesc::getTableName();

        $page = DB::table($table)
            ->join($tableDesc, "$table.$pk", '=', "$tableDesc.$pk")
            ->where("$table.$pk", $id)
            ->select()
            ->get();

        return $page;
    }

    public static function getByIDWithStatus($id){
        if(!(int)$id) return null;
        $table = self::getTableName();
        $pk = self::getPrimaryKey();
        $tableDesc = self::getDescription();
        $tableDesc = $tableDesc::getTableName();

        $pages = DB::table($table)
            ->join($tableDesc, "$table.$pk", '=', "$tableDesc.$pk")
            ->where("$table.status", 1)
            ->where("$table.$pk", $id)
            ->select()
            ->get();

        return $pages;
    }

    public static function getDescription(){
        return "App\\" . static::$description;
    }

}
