<?php

namespace App\Models;

class Product extends Model
{
    protected $table = 'products';

    public function description(){
        return $this->hasOne(ProductDescription::class, 'product_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_to_category', 'product_id', 'category_id');
    }


    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
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
