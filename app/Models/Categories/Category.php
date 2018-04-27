<?php

namespace App\Models\Categories;

use App\Models\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function description(){
        return $this->hasOne(CategoryDescription::class, 'category_id');
    }

    public function allDescription(){
        return $this->hasMany(CategoryDescription::class, 'category_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_to_category', 'category_id', 'product_id');
    }

    public function getDescription($type){
        $desc = $this->with([
            'description' => function($query){
                $query->where('language_id', 1);
            }
        ]);
        dd($desc->get());
    }
}
