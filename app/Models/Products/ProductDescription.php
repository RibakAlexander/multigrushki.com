<?php

namespace App\Models\Products;

use App\Models\Model;

class ProductDescription extends Model
{
    protected $primaryKey = 'product_id';
    protected $table = 'product_description';
}
