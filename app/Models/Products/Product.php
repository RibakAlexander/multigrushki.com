<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use App\Models\Manufacturers\Manufacturer;
use App\Models\Products\ProductDescription;
use App\Models\Model;

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

}
