<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{

    protected $fillable = [
        'purchases_status',
    ];

    public function suppliers(){

        return $this->belongsTo(Supplier::class,'purchases_supplier_id','id');

    }
}
