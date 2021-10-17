<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand(){

        return $this->belongsTo(Brand::class,'product_brand','id');

    }

    public function unit(){

        return $this->belongsTo(Unit::class,'product_unit','id');

    }

    public function category(){

        return $this->belongsTo(Category::class,'product_category','id');

    }
}
