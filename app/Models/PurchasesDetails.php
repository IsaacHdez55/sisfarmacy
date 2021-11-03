<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesDetails extends Model
{
    public function purchases(){
        return $this->belongsTo(Purchases::class,'purchases_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
