<?php

namespace App\Models;

class Manufacturer extends Model
{
    protected $primaryKey = 'manufacturer_id';
    protected $table = 'manufacturers';

    public function description(){
        return $this->hasMany('App\Models\ManufacturerDescription', 'manufacturer_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'manufacturer_id', 'product_id');
    }
}
