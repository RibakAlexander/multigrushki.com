<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $table = 'categories';

    public function description(){
        return $this->hasMany('App\CategoryDescription', 'category_id');
    }

    public static function getAllCategories(){
        $categories = DB::table('categories')
            ->join('category_description', "categories.category_id", '=', 'category_description.category_id')
            ->where('categories.status', 1)
            ->select()
            ->get();
        //SELECT * FROM `mi_categories` LEFT JOIN mi_category_description ON(mi_categories.category_id = mi_category_description.category_id) WHERE mi_categories.status = 1
        return $categories;
    }

    public static function getSections(){
        $categories = DB::table('categories')
            ->join('category_description', "categories.category_id", '=', 'category_description.category_id')
            ->where('categories.status', 1)
            ->where('categories.parent_id', 0)
            ->select()
            ->get();
        //SELECT * FROM `mi_categories` LEFT JOIN mi_category_description ON(mi_categories.category_id = mi_category_description.category_id) WHERE mi_categories.status = 1
        return $categories;
    }

    public static function getCategoriesByParentID($parentID){
        if(!(int)$parentID) return [];
        $categories = DB::table('categories')
            ->join('category_description', "categories.category_id", '=', 'category_description.category_id')
            ->where('categories.status', 1)
            ->where('categories.parent_id', $parentID)
            ->select()
            ->get();
        //SELECT * FROM `mi_categories` LEFT JOIN mi_category_description ON(mi_categories.category_id = mi_category_description.category_id) WHERE mi_categories.status = 1
        return $categories;
    }
}
