<?php

namespace App\Models\Manufacturers;

use App\Models\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';

    public function description(){
        return $this->hasOne(ManufacturerDescription::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
