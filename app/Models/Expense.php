<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    protected $fillable = [
        'status',
    ];

    public function expense_category(){

        return $this->belongsTo(ExpenseCategory::class,'expenses_category_id','id');

    }
}
