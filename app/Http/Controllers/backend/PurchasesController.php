<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function PurchasesView(){

        // $data['allData'] = Product::all();

        return view('backend.purchases.view_purchases');

    }

    public function PurchaseAdd(){

        // $data['brands'] = Brand::all();
        // $data['categories'] = Category::all();
        // $data['units'] = Unit::all();

        return view('backend.purchases.add_purchase');

    }
}
