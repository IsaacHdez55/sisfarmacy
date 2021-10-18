<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PrintLabelsController extends Controller
{
    public function PrintLabelsView(){

        return view('backend.product.view_print_labels');

    }

    public function PrintLabelsSearch(Request $request){

        $ser = $request->get('ser');

        $querys = Product::where('product_name', 'LIKE', '%' . $ser . '%')->select('product_name as label')->get();

        return $querys;

    }
}
